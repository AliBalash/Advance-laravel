<?php

namespace App\FacadesTest;

use Illuminate\Support\Facades\Facade;

class PostCart extends Facade
{

        //Extend facade and use Container service for accessor method other class

//    public static function getFacadeAccessor()
//    {
//        return 'postCart';
//    }

    public static function __callStatic($method, $arguments)
    {
//        dd(self::resolveFacade('postCart')->$method(...$arguments));
        return self::resolveFacade('postCart')->$method(...$arguments);
    }

    public static function resolveFacade($nameContainer)
    {

        return app()[$nameContainer];

    }


}
