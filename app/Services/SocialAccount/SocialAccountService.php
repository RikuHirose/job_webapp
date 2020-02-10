<?php

namespace App\Services\SocialAccount;

use Laravel\Socialite\Contracts\User as ProviderUser;
use App\Models\SocialAccount;

class SocialAccountService implements SocialAccountServiceInterface
{
    public function getOrCreate($providerUser, $provider)
    {
        $account = SocialAccount::where('provider', $provider)
            ->where('provider_user_id', $providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {

            session([
                'callback_provider_user' => $providerUser,
                'callback_provider'      => $provider,
            ]);

            return false;
        }
    }
}
