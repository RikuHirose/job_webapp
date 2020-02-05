<?php

namespace App\Repositories\UserOccupation;

use App\Repositories\Base\BaseRepositoryInterface;

interface UserOccupationRepositoryInterface extends BaseRepositoryInterface
{
		public function getBlankModel();

    public function existByUserIdAndOccupationId(int $userId, int $occupationId);
}
