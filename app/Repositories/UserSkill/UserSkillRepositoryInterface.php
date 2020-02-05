<?php

namespace App\Repositories\UserSkill;

use App\Repositories\Base\BaseRepositoryInterface;

interface UserSkillRepositoryInterface extends BaseRepositoryInterface
{
		public function getBlankModel();

    public function existByUserIdAndSkillId(int $userId, int $skillId);
}
