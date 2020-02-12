<?php
namespace App\Facades\Helpers;

use Illuminate\Support\Facades\Facade;

class UrlHelper extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \App\Helpers\UrlHelper::class;
    }
}
