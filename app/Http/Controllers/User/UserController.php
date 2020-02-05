<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function edit()
    {
        return view('pages.users.edit', [
        ]);
    }

    public function update(UserRequest $request)
    {
        $input  = $request->only($this->userRepository->getBlankModel()->getFillable());
        $update = \Auth::user()->update($input);

        if (empty($update)) {
            return redirect()->back()->withErrors(trans('errors.general.save_failed'));
        }

        return redirect()->back();
    }

    public function getFavorites()
    {
        
    }

    public function getApplications()
    {
        
    }
}
