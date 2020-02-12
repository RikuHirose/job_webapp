<?php

namespace App\Services\SocialAccount;

use Laravel\Socialite\Contracts\User as ProviderUser;
use App\Repositories\SocialAccount\SocialAccountRepositoryInterface;

class SocialAccountService implements SocialAccountServiceInterface
{
    protected $socialAccountRepository;

    public function __construct(
        SocialAccountRepositoryInterface $socialAccountRepository
    )
    {
        $this->socialAccountRepository = $socialAccountRepository;
    }

    public function firstOrCreate($providerUser, $provider)
    {
        $account = $this->socialAccountRepository->firstOrCreate([
            'provider' => $provider,
            'provider_user_id', $providerUser->getId()
        ]);
        // $account = SocialAccount::where('provider', $provider)
        //     ->where('provider_user_id', $providerUser->getId())
        //     ->first();

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
