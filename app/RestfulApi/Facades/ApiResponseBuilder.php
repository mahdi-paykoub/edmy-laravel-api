<?php


namespace App\RestfulApi\Facades;


use Illuminate\Support\Facades\Facade;

class ApiResponseBuilder extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'apiResponse';
    }
}
