<?php

namespace App\Repositories\UserSkill;

Use App\Models\UserSkill;
use App\Repositories\Base\BaseRepository;

class UserSkillRepository extends BaseRepository implements UserSkillRepositoryInterface
{

		public function getBlankModel()
		{
			return new UserSkill();
		}

    public function existByUserIdAndSkillId(int $userId, int $skillId)
    {
      return $this->getBlankModel()->where('user_id', $userId)->where('skill_id', $skillId)->exists();
    }
}
