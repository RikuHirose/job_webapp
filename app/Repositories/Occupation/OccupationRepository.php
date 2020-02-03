<?php

namespace App\Repositories\Occupation;

Use App\Models\Occupation;

class OccupationRepository implements OccupationRepositoryInterface
{

		public function getBlankModel()
		{
			return new Occupation();
		}
}
