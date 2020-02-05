<?php

namespace App\Repositories\UserOccupation;

interface UserOccupationRepositoryInterface
{
		public function getBlankModel();

    public function existByUserIdAndOccupationId(int $userId, int $occupationId);
}
