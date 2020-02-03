<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Skill;
use App\Models\Occupation;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $skills      = Skill::all();
        $occupations = Occupation::all();
        $jobs        = Job::paginate(2);

        $jobs->load('bgImage', 'company', 'occupations', 'skills');

        return view('home', [
            'jobs'        => $jobs,
            'skills'      => $skills,
            'occupations' => $occupations,
        ]);
    }
}
