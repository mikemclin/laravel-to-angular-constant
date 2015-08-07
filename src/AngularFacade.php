<?php

namespace MikeMcLin\Angular;

use Illuminate\Support\Facades\Facade;

class AngularFacade extends Facade
{
    /**
     * The name of the binding in the IoC container.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Angular';
    }
}
