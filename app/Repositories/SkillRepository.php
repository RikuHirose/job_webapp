<?php
namespace App\Repositories;

use App\Models\Skill;

class SkillRepository
{
    protected $skill;

    /**
    * @param object $skill
    */
    public function __construct(Skill $skill)
    {
        $this->skill = $skill;
    }

    public function getBlankModel()
    {
        return new Skill();
    }
}