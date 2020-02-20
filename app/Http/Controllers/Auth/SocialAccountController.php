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
        // session(['previousPage' => url()->previous()]);

        return \Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information
     *
     * @return Response
     */
    public function handleProviderCallback($providerName)
    {

        try {
            // https://qiita.com/hikarizm/items/44c1e9ff34726c9260d3
            $socialUser = \Socialite::driver($providerName)->stateless()->user();
            $socialUser2 = \Socialite::driver($providerName)->user();
            logger($socialUser);
            logger($socialUser2);

        } catch (\Exception $e) {
            \Log::error(url()->full());
            \Log::error($e);
            return redirect('/login');
        }

        //privider_idですでに登録済みかチェック
        $socialAccount = $this->socialAccountRepository->findByProviderId($socialUser->getId());

        if (!$socialAccount) {

            $user = \DB::transaction(function () use ($socialUser, $providerName) {

                $user = $this->userRepository->firstOrCreate([
                      'name'        => $socialUser->getName(),
                      'email'       => $socialUser->getEmail(),
                      'cover_url'   => $socialUser->avatar_original
                ]);

                $socialAccount = $this->socialAccountRepository->firstOrCreate([
                    'user_id'     => $user->id,
                    'provider_id' => $socialUser->getId(),
                    'provider'    => $providerName
                ]);

                return $user;
          });
        }

        if ($socialAccount) {

            $user = $this->userRepository->find($socialAccount->user_id);
        }

        auth()->login($user);


        // if (!$authUser) {
        //     return redirect(route('auth.get.email'));
        // }

        return redirect('/')->with([
            'toast' => [
                'status'  => 'success',
                'message' => 'ログインしました'
            ]
        ]);

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
