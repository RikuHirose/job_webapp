<?php
namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApplicationController extends Controller
{
    public function postFavorite(Request $request)
    {
        $input = $request->only($this->applicationRepository->getBlankModel()->getFillable());

        try {
            $this->applicationRepository->firstOrCreate($input);
            // userとcompanyにemail通知
            // \MailHelper::mailsend($to, $sendContent)

        } catch (\Exception $e) {
            \Log::error($e);
            return response(['status' => 'fail']);
        }

        return response([
            'status'     => 'success',
        ]);
    }
}
