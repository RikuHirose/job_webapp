<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Skill;
use App\Models\Occupation;

class JobController extends Controller
{

    public function __construct(
    )
    {
    }


    public function index(Request $request)
    {
        $parameter = \Request::query();
        $jobs   = new Job();
        $skills      = Skill::all();
        $occupations = Occupation::all();

        if (!is_null($parameter['occupation_id'])) {
            $occupationId = $parameter['occupation_id'];
            $jobs         = $jobs->when($occupationId, function ($query) use ($occupationId) {
                return $query->whereHas('occupations', function ($q) use ($occupationId) {
                    $q->where('occupations.id', $occupationId);
                });
            });
        }

        if (!is_null($parameter['skill_id'])) {
            $skillId = $parameter['skill_id'];
            $jobs    = $jobs->when($skillId, function ($query) use ($skillId) {
                return $query->whereHas('skills', function ($q) use ($skillId) {
                    $q->where('skills.id', $skillId);
                });
            });
        }

        $jobs = $jobs->paginate();
        $jobs->load('bgImage', 'company.logo', 'occupations', 'skills');

        \SeoHelper::setIndexSeo();

        return view('pages.jobs.index', [
            'jobs'      => $jobs,
            'parameter' => $parameter,
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
