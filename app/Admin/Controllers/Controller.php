<?php

namespace App\Admin\Controllers;

use Encore\Admin\Controllers\AdminController;

use App\Repositories\Job\JobRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Skill\SkillRepositoryInterface;
use App\Repositories\Company\CompanyRepositoryInterface;
use App\Repositories\Favorite\FavoriteRepositoryInterface;
use App\Repositories\UserSkill\UserSkillRepositoryInterface;
use App\Repositories\Occupation\OccupationRepositoryInterface;
use App\Repositories\Application\ApplicationRepositoryInterface;
use App\Repositories\UserOccupation\UserOccupationRepositoryInterface;

class Controller extends AdminController
{
    protected $jobRepository;
    protected $userRepository;
    protected $skillRepository;
    protected $companyRepository;
    protected $favoriteRepository;
    protected $userSkillRepository;
    protected $occupationRepository;
    protected $applicationRepository;
    protected $userOccupationRepository;

    public function __construct(
        JobRepositoryInterface $jobRepository,
        UserRepositoryInterface $userRepository,
        SkillRepositoryInterface $skillRepository,
        CompanyRepositoryInterface $companyRepository,
        FavoriteRepositoryInterface $favoriteRepository,
        UserSkillRepositoryInterface $userSkillRepository,
        OccupationRepositoryInterface $occupationRepository,
        ApplicationRepositoryInterface $applicationRepository,
        UserOccupationRepositoryInterface $userOccupationRepository
    )
    {
        $this->jobRepository            = $jobRepository;
        $this->userRepository           = $userRepository;
        $this->skillRepository          = $skillRepository;
        $this->companyRepository        = $companyRepository;
        $this->favoriteRepository       = $favoriteRepository;
        $this->userSkillRepository      = $userSkillRepository;
        $this->occupationRepository     = $occupationRepository;
        $this->applicationRepository    = $applicationRepository;
        $this->userOccupationRepository = $userOccupationRepository;
    }
}
