<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Jobs\Hoge;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $jobs = $this->jobRepository->paginateFilterByParameters();
        $jobs->load('company', 'occupations', 'skills');

        \SeoHelper::setIndexSeo();

        return view('pages.index', [
            'jobs' => $jobs,
        ]);
    }

    public function show(Request $request)
    {
        Hoge::dispatch()->delay(10);
        dd(1);
    }
}
