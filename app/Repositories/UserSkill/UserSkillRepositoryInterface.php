<?php

namespace App\Repositories\UserSkill;

interface UserSkillRepositoryInterface
{
		public function getBlankModel();

    public function existByUserIdAndSkillId(int $userId, int $skillId);
}
