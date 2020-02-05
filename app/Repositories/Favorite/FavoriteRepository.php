<?php

namespace App\Repositories\Favorite;

Use App\Models\Favorite;
use App\Repositories\Base\BaseRepository;

class FavoriteRepository extends BaseRepository implements FavoriteRepositoryInterface
{

		public function getBlankModel()
		{
			return new Favorite();
		}

    public function getFavoriteCount(int $jobId)
    {
        return $this->getBlankModel()->where('job_id', $jobId)->count();
    }

    public function getIsFavorited(int $jobId, int $userId)
    {
        return $this->getBlankModel()->where('job_id', $jobId)->where('user_id', $userId)->exists();
    }
}
