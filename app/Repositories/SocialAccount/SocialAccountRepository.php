<?php

namespace App\Repositories\SocialAccount;

Use App\Models\SocialAccount;
use App\Repositories\Base\BaseRepository;

class SocialAccountRepository extends BaseRepository implements SocialAccountRepositoryInterface
{

		public function getBlankModel()
		{
			return new SocialAccount();
		}

    public function findByProviderId(String $providerId)
    {
        return $this->getBlankModel()->where('provider_id', $providerId)->first();
    }
}
