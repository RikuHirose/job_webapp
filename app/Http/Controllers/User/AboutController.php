<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{

    public function privacy()
    {
        return view('pages.about.privacy', [
        ]);
    }
}
