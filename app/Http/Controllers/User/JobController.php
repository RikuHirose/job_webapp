<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Job;

class JobController extends Controller
{

    public function index(Request $request)
    {
        $parameters  = \Request::query();

        $jobs = $this->jobRepository->paginateFilterByParameters($parameters);
        $jobs->load('bgImage', 'company.logo', 'occupations', 'skills');

        \SeoHelper::setIndexSeo();

        return view('pages.jobs.index', [
            'jobs'      => $jobs,
            'parameters' => $parameters,
        ]);
    }

    public function show(Job $job)
    {
        $job->load('bgImage', 'company.logo', 'occupations', 'skills');

        $defaultIsFavorited   = \Auth::check() ? $this->favoriteRepository->getIsFavorited($job->id, \Auth::user()->id) : false;
        $defaultFavoriteCount = $this->favoriteRepository->getFavoriteCount($job->id);

        \SeoHelper::setJobShowSeo($job);

        return view('pages.jobs.show', [
            'job'                  => $job,
            'defaultIsFavorited'   => $defaultIsFavorited,
            'defaultFavoriteCount' => $defaultFavoriteCount,
        ]);
    }
}
