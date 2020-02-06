<?php

namespace App\Repositories\Application;

use App\Repositories\Base\BaseRepositoryInterface;

interface ApplicationRepositoryInterface extends BaseRepositoryInterface
{
		public function getBlankModel();

    public function isApplied(int $jobId, int $userId);
}
