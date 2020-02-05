<?php

namespace App\Repositories\Favorite;

use App\Repositories\Base\BaseRepositoryInterface;

interface FavoriteRepositoryInterface extends BaseRepositoryInterface
{
		public function getBlankModel();

    public function getFavoriteCount(int $jobId);

    public function getIsFavorited(int $jobId, int $userId);
}
