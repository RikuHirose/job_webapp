<?php

namespace App\Repositories\Skill;

Use App\Models\Skill;

class SkillRepository implements SkillRepositoryInterface
{

		public function getBlankModel()
		{
			return new Skill();
		}
}
