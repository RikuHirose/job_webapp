<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{

    public function index()
    {
        $jobs = $this->jobRepository->paginateFilterByParameters();
        $jobs->load('bgImage', 'company.logo', 'occupations', 'skills');

        \SeoHelper::setIndexSeo();

        return view('pages.home', [
            'jobs' => $jobs,
        ]);
    }
}
