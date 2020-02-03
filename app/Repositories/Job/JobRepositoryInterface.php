<?php

namespace App\Repositories\Job;

interface JobRepositoryInterface
{
		public function getBlankModel();

    public function filterByParameters(Array $parameters);
}
