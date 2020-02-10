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
use App\Repositories\Application\ApplicationRepositoryInterface;
use App\Repositories\UserOccupation\UserOccupationRepositoryInterface;

use App\Services\S3\S3ServiceInterface;
use App\Services\SocialAccount\SocialAccountServiceInterface;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $jobRepository;
    protected $userRepository;
    protected $skillRepository;
    protected $favoriteRepository;
    protected $userSkillRepository;
    protected $occupationRepository;
    protected $applicationRepository;
    protected $userOccupationRepository;

    protected $s3Service;
    protected $socialAccountService;

    public function __construct(
        JobRepositoryInterface $jobRepository,
        UserRepositoryInterface $userRepository,
        SkillRepositoryInterface $skillRepository,
        FavoriteRepositoryInterface $favoriteRepository,
        UserSkillRepositoryInterface $userSkillRepository,
        OccupationRepositoryInterface $occupationRepository,
        ApplicationRepositoryInterface $applicationRepository,
        UserOccupationRepositoryInterface $userOccupationRepository,

        S3ServiceInterface $s3Service,
        SocialAccountServiceInterface $socialAccountService
    )
    {
        $this->jobRepository            = $jobRepository;
        $this->userRepository           = $userRepository;
        $this->skillRepository          = $skillRepository;
        $this->favoriteRepository       = $favoriteRepository;
        $this->userSkillRepository      = $userSkillRepository;
        $this->occupationRepository     = $occupationRepository;
        $this->applicationRepository    = $applicationRepository;
        $this->userOccupationRepository = $userOccupationRepository;
        $this->s3Service                = $s3Service;
        $this->socialAccountService     = $socialAccountService;
    }
}
