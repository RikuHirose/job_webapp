<?php

namespace App\Services\SocialAccount;

interface SocialAccountServiceInterface
{
  public function firstOrCreate($providerUser, $provider);
}
