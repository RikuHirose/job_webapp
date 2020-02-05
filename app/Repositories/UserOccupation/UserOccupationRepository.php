<?php

namespace App\Repositories\UserOccupation;

Use App\Models\UserOccupation;
use App\Repositories\Base\BaseRepository;

class UserOccupationRepository extends BaseRepository implements UserOccupationRepositoryInterface
{

		public function getBlankModel()
		{
			return new UserOccupation();
		}

    public function existByUserIdAndOccupationId(int $userId, int $occupationId)
    {
      return $this->getBlankModel()->where(
        ['user_id' => $userId],
        ['occupation_id' => $occupationId],
      )->exists();
    }
}
