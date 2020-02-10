<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class SocialAccountController extends Controller
{
    /**
     * Redirect the user to the Provider authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return \Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {

        try {
            $user = \Socialite::with($provider)->user();
        } catch (\Exception $e) {
            \Log::error($e);
            return redirect('/login');
        }

        $authUser = $this->socialAccountService->getOrCreate($user, $provider);

        if(!$authUser) {
            return redirect(route('auth.get.email'));
        }

        Auth::login($authUser);

        return redirect()->to('/');
    }

    public function getEmail()
    {
        if (Auth::check()) {
            return redirect('/');
        }

        $provider     = session('callback_provider');
        $providerUser = session('callback_provider_user');

        if(empty($provider) || empty($providerUser)) {
            return redirect('/login');
        }

        return view('auth.email');
    }

}
