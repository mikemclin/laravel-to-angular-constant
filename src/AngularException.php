<?php

namespace MikeMcLin\Angular;

class AngularException extends \Exception
{
    /**
     * The exception message.
     *
     * @var string
     */
    protected $message = 'Angular configuration must be published. Use: "php artisan vendor:publish".';
}
