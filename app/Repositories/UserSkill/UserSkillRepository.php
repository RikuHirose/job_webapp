<?php

namespace App\Repositories\UserSkill;

Use App\Models\UserSkill;

class UserSkillRepository implements UserSkillRepositoryInterface
{

		public function getBlankModel()
		{
			return new UserSkill();
		}

    public function existByUserIdAndSkillId(int $userId, int $skillId)
    {
      return $this->getBlankModel()->where(
        ['user_id'  => $userId],
        ['skill_id' => $skillId],
      )->exists();
    }
}
