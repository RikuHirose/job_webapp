<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    public function index()
    {
        $jobs = $this->jobRepository->paginateFilterByParameters();
        $jobs->load('bgImage', 'company.logo', 'occupations', 'skills');

        \SeoHelper::setIndexSeo();

        return view('pages.index', [
            'jobs' => $jobs,
        ]);
    }
}
