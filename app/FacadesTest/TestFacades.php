<?php

namespace App\FacadesTest;

class TestFacades
{

    public static function __callStatic($name, $arguments)
    {
        dd(self::resolveOskol('oskol'));
    }

    public static function resolveOskol($nameContainer)
    {
        return app()[$nameContainer];

    }

}
