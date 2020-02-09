<?php
namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Mail\UserApplyMailable;
use App\Mail\CompanyApplyMailable;

class ApplicationController extends Controller
{
    public function store(Request $request)
    {
        $input = $request->only($this->applicationRepository->getBlankModel()->getFillable());

        try {

            if (!$this->applicationRepository->isApplied($input['job_id'], $input['user_id'])) {
                $application = $this->applicationRepository->firstOrCreate($input);
                $application->load('job', 'user', 'company');

                // userとcompanyにemail通知
                $userSentContent    = new UserApplyMailable($application);
                $companySentContent = new CompanyApplyMailable($application);

                \MailHelper::mailSend($application->user->email, $userSentContent);
                \MailHelper::mailSend($application->company->email, $companySentContent);

                return response([
                    'status'     => 'success',
                ]);
            }

        } catch (\Exception $e) {
            \Log::error($e);
            return response(['status' => 'fail']);
        }
    }
}
