<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobController extends Controller
{

    public function index(Request $request)
    {
        $parameters  = \Request::query();
        $skills      = $this->skillRepository->getBlankModel()->all();
        $occupations = $this->occupationRepository->getBlankModel()->all();

        $jobs = $this->jobRepository->paginateFilterByParameters($parameters);
        $jobs->load('bgImage', 'company.logo', 'occupations', 'skills');

        \SeoHelper::setIndexSeo();

        return view('pages.jobs.index', [
            'jobs'      => $jobs,
            'parameters' => $parameters,
            'skills'      => $skills,
            'occupations' => $occupations,
        ]);
    }

    public function show(Job $job)
    {
        $job->load('bgImage', 'company.logo', 'occupations', 'skills');

        \SeoHelper::setJobShowSeo();
        return view('pages.jobs.show', [
                'job' => $job,
        ]);
    }
}
