<?php

namespace App\Repositories\Application;

Use App\Models\Application;
use App\Repositories\Base\BaseRepository;

class ApplicationRepository extends BaseRepository implements ApplicationRepositoryInterface
{

		public function getBlankModel()
		{
			return new Application();
		}

    public function isApplied(int $jobId, int $userId)
    {
        return $this->getBlankModel()->where('job_id', $jobId)->where('user_id', $userId)->exists();
    }
}
