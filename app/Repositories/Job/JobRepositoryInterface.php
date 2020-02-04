<?php

namespace App\Repositories\Job;

interface JobRepositoryInterface
{
		public function getBlankModel();

    public function paginateFilterByParameters(Array $parameters);
}
