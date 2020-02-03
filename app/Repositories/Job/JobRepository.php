<?php

namespace App\Repositories\Job;

class JobRepository implements JobRepositoryInterface
{

		public function getBlankModel()
		{
			return new Job();
		}
}
