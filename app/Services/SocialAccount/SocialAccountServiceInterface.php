<?php

namespace App\Services\SocialAccount;

interface SocialAccountServiceInterface
{
  public function getOrCreate($providerUser, $provider);
}
