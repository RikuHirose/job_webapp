<?php
namespace App\Helpers;

use Illuminate\Http\Request;
use App\Repositories\UserSkill\UserSkillRepositoryInterface;
use App\Repositories\UserOccupation\UserOccupationRepositoryInterface;

class UserHelper
{
    protected $userSkillRepository;
    protected $userOccupationRepository;

    public function __construct(
        UserSkillRepositoryInterface $userSkillRepository,
        UserOccupationRepositoryInterface $userOccupationRepository
    ) {
        $this->userSkillRepository      = $userSkillRepository;
        $this->userOccupationRepository = $userOccupationRepository;
    }

    public function getFullBirthDay()
    {
        return explode('-', \Auth::user()->birthday);
    }

    public function getBirthYear()
    {
        $birthDay = $this->getFullBirthDay();

        if (!isset($birthDay)) {
            return $birthDay[0];
        }
    }
    public function getBirthMonth()
    {
        $birthDay = $this->getFullBirthDay();

        if (!isset($birthDay)) {
            return $birthDay[1];
        }
    }
    public function getBirthDay()
    {
        $birthDay = $this->getFullBirthDay();

        if (!isset($birthDay)) {
            return $birthDay[2];
        }
    }

    public function existUserOccupation(int $occupationId)
    {
        return $this->userOccupationRepository->existByUserIdAndOccupationId(\Auth::user()->id, $occupationId);
    }

    public function existUserSkill(int $skillId)
    {
        return $this->userSkillRepository->existByUserIdAndSkillId(\Auth::user()->id, $skillId);
    }

}
