<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Repositories\Job\JobRepositoryInterface;
use App\Repositories\Skill\SkillRepositoryInterface;
use App\Repositories\Occupation\OccupationRepositoryInterface;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $jobRepository;
    protected $skillRepository;
    protected $occupationRepository;

    public function __construct(
        JobRepositoryInterface $jobRepository,
        SkillRepositoryInterface $skillRepository,
        OccupationRepositoryInterface $occupationRepository
    )
    {
        $this->jobRepository        = $jobRepository;
        $this->skillRepository      = $skillRepository;
        $this->occupationRepository = $occupationRepository;
    }
}
