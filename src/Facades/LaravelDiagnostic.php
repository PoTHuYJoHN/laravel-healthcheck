<?php

namespace Webkid\LaravelDiagnostic\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelDiagnostic extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laraveldiagnostic';
    }
}
