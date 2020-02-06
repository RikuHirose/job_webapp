<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function edit()
    {
        $user = \Auth::user();

        return view('pages.users.edit', [
        ]);
    }

    public function update(UserRequest $request)
    {
        $skillIds      = $request->input('skills');
        $occupationIds = $request->input('occupations');
        $input         = $request->only($this->userRepository->getBlankModel()->getFillable());

        $user = \DB::transaction(function () use ($input, $skillIds, $occupationIds) {
            $user = $this->userRepository->update(\Auth::user(), $input);

            // $user->userSkills()->delete();
            // $user->userOccupations()->delete();
            if (!is_null($skillIds)) {
                foreach ($skillIds as $key => $skillId) {
                    $this->userSkillRepository->firstOrCreate([
                        'user_id'  => $user->id,
                        'skill_id' => $skillId,
                    ]);
                }
            }

            if (!is_null($occupationIds)) {
                foreach ($occupationIds as $key => $occupationId) {
                    $this->userOccupationRepository->firstOrCreate([
                        'user_id'        => $user->id,
                        'occupation_id'  => $occupationId,
                    ]);
                }
            }

            return $user;
        });

        if (empty($user)) {
            return redirect()->back()->withErrors(trans('errors.general.save_failed'));
        }

        return redirect()->back();
    }

    public function getFavorites()
    {
        $jobs = $this->jobRepository->getByFavorited(\Auth::user()->id);

        \SeoHelper::setUserFavoriteSeo();

        return view('pages.users.favorite', [
            'jobs' => $jobs
        ]);
    }

    public function getApplications()
    {
        $jobs = $this->jobRepository->getByApplied(\Auth::user()->id);

        \SeoHelper::setUserApplicationSeo();

        return view('pages.users.application', [
            'jobs' => $jobs
        ]);
    }
}
