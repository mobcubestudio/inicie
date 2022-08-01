<?php

namespace App\Classes;
use Illuminate\Support\Facades\Facade;

class GeralFacade extends Facade{

    protected static function getFacadeAccessor()
    {
        return 'geral';
    }
}
