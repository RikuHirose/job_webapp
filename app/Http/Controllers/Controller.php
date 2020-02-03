<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Repositories\JobRepository;
use App\Repositories\SkillRepository;
use App\Repositories\OccupationRepository;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $jobRepository;
    protected $skillRepository;
    protected $occupationRepository;

    public function __construct(
        JobRepository $jobRepository,
        SkillRepository $skillRepository,
        OccupationRepository $occupationRepository
    )
    {
        $this->jobRepository        = $jobRepository;
        $this->skillRepository      = $skillRepository;
        $this->occupationRepository = $occupationRepository;
    }
}
