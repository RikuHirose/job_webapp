<?php

namespace App\Repositories\UserOccupation;

Use App\Models\UserOccupation;

class UserOccupationRepository implements UserOccupationRepositoryInterface
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
