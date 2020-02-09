<?php

namespace App\Repositories\Job;

use App\Models\Job;
use App\Repositories\Base\BaseRepositoryInterface;

interface JobRepositoryInterface extends BaseRepositoryInterface
{
		public function getBlankModel();

    public function paginateFilterByParameters(Array $parameters = null);

    public function getByRelationModelKey(Array $relationModelKey);

    public function paginateByFavorited(int $userId);

    public function paginateByApplied(int $userId);
}
