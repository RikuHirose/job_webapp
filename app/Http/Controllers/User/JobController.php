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
        $jobs->load('company', 'occupations', 'skills');

        \SeoHelper::setIndexSeo();

        return view('pages.jobs.index', [
            'jobs'       => $jobs,
            'parameters' => $parameters,
        ]);
    }

    public function show(Job $job)
    {
        $job->load('company', 'occupations', 'skills');

        $defaultIsApplied     = \Auth::check() ? $this->applicationRepository->isApplied($job->id, \Auth::user()->id) : false;
        $defaultIsFavorited   = \Auth::check() ? $this->favoriteRepository->isFavorited($job->id, \Auth::user()->id) : false;
        $defaultFavoriteCount = $this->favoriteRepository->getFavoriteCount($job->id);

        $relatedJobs = $this->jobRepository->getByRelationModelKey([
            'skill_id'      => $job->skills->modelKeys(),
            'occupation_id' => $job->occupations->modelKeys()
        ]);
        $relatedJobs->load('company', 'occupations', 'skills');

        \SeoHelper::setJobShowSeo($job);

        return view('pages.jobs.show', [
            'job'                  => $job,
            'relatedJobs'          => $relatedJobs->take(3),
            'defaultIsApplied'     => $defaultIsApplied,
            'defaultIsFavorited'   => $defaultIsFavorited,
            'defaultFavoriteCount' => $defaultFavoriteCount,
        ]);
    }
}
