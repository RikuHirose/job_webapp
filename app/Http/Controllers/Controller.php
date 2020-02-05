<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Repositories\Job\JobRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Skill\SkillRepositoryInterface;
use App\Repositories\Favorite\FavoriteRepositoryInterface;
use App\Repositories\UserSkill\UserSkillRepositoryInterface;
use App\Repositories\Occupation\OccupationRepositoryInterface;
use App\Repositories\UserOccupation\UserOccupationRepositoryInterface;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $jobRepository;
    protected $userRepository;
    protected $skillRepository;
    protected $favoriteRepository;
    protected $userSkillRepository;
    protected $occupationRepository;
    protected $userOccupationRepository;

    public function __construct(
        JobRepositoryInterface $jobRepository,
        UserRepositoryInterface $userRepository,
        SkillRepositoryInterface $skillRepository,
        FavoriteRepositoryInterface $favoriteRepository,
        UserSkillRepositoryInterface $userSkillRepository,
        OccupationRepositoryInterface $occupationRepository,
        UserOccupationRepositoryInterface $userOccupationRepository
    )
    {
        $this->jobRepository            = $jobRepository;
        $this->userRepository           = $userRepository;
        $this->skillRepository          = $skillRepository;
        $this->favoriteRepository       = $favoriteRepository;
        $this->occupationRepository     = $occupationRepository;
        $this->userSkillRepository      = $userSkillRepository;
        $this->userOccupationRepository = $userOccupationRepository;
    }
}
