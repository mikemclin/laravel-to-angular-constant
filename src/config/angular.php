<?php

return [

    /*
    |--------------------------------------------------------------------------
    | View to Bind Angular Constant To
    |--------------------------------------------------------------------------
    |
    | Set this value to the name of the view (or partial) that
    | you want to prepend your Angular constant to.
    | This can be a single view, or an array of views.
    | Example: 'footer' or ['footer', 'bottom']
    |
    */
    'bind_ng_constant_to_this_view' => 'footer',

    /*
    |--------------------------------------------------------------------------
    | Angular Module
    |--------------------------------------------------------------------------
    |
    | Change this to the Angular module that you want to bind (output)
    | your Angular constant to. You will probably want to include this
    | module as a submodule of your Angular app module.
    |
    */
    'ng_module' => 'laravelToAngularConstant',

    /*
    |--------------------------------------------------------------------------
    | Angular Constant Name
    |--------------------------------------------------------------------------
    |
    | The name of the Angular constant we are attaching the data to.
    |
    */
    'ng_constant' => 'DATA'

];
