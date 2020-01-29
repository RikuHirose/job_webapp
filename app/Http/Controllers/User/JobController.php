<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Job;

class JobController extends Controller
{

    public function __construct(
    )
    {
    }


    public function index(Request $request)
    {
    }

    public function show(Job $job)
    {
        $job->load('bgImage', 'company.logo', 'occupations', 'skills');

        return view('pages.jobs.show',
            [
                'job' => $job,
            ]
        );
    }
}
