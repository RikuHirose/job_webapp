<?php

namespace App\Repositories\Job;

use App\Repositories\Base\BaseRepositoryInterface;

interface JobRepositoryInterface extends BaseRepositoryInterface
{
		public function getBlankModel();

    public function paginateFilterByParameters(Array $parameters = null);
}
