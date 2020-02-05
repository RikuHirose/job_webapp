<?php

namespace App\Repositories\Skill;

Use App\Models\Skill;
use App\Repositories\Base\BaseRepository;

class SkillRepository extends BaseRepository implements SkillRepositoryInterface
{

		public function getBlankModel()
		{
			return new Skill();
		}
}
