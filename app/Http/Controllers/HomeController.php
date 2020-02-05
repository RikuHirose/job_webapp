<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class HomeController extends Controller
{

    public function index()
    {
        $jobs = $this->jobRepository->paginateFilterByParameters();
        $jobs->load('bgImage', 'company.logo', 'occupations', 'skills');

        \SeoHelper::setIndexSeo();

        return view('home', [
            'jobs'        => $jobs,
        ]);
    }
}
