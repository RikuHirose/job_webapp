<?php

namespace App\Repositories\Occupation;

Use App\Models\Occupation;
use App\Repositories\Base\BaseRepository;

class OccupationRepository extends BaseRepository implements OccupationRepositoryInterface
{

		public function getBlankModel()
		{
			return new Occupation();
		}
}
