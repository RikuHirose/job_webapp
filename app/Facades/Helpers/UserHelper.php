<?php
namespace App\Facades\Helpers;

use Illuminate\Support\Facades\Facade;

class UserHelper extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \App\Helpers\UserHelper::class;
    }
}
