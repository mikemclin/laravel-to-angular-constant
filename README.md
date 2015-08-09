# Laravel to Angular Constant

---

#### Based on: [laracasts/PHP-Vars-To-Js-Transformer](https://github.com/laracasts/PHP-Vars-To-Js-Transformer)

---

This package allows you to easily output Laravel 5 data as an Angular constant.
This works great for sharing configuration settings, etc.

## Basic Usage

You'll gain access to a helpful `Angular` facade, which you may use in your controllers.

```php
public function index()
{
    Angular::put([
        'foo' => 'bar',
        'age' => 29
    ]);

    return View::make('footer');
}
```

Using the code above, the following will be outputted (based on the default config).

```js
angular.module('laravelToAngularConstant', []).constant('DATA', {'foo', 'bar', 'age': 29});
```

Now, you would want to add that module as a submodule of your app.

```js
angular.module('app', ['laravelToAngularConstant']);
```

## How it works

It prepends the data to the Laravel View that you define in the config (`footer` by default).  Normally, you would include that view file into your master layout view, etc.

## Installation

Begin by installing this package through Composer.

```js
{
    "require": {
        "mikemclin/laravel-to-angular-constant": "~1.0.0"
    }
}
```

Next, setup the Laravel 5 service provider

```php

// config/app.php

'providers' => [
    '...',
    'MikeMcLin\Angular\AngularServiceProvider'
];
```

Publish the default configuration.

```bash
php artisan vendor:publish
```

This will add a new configuration file to: `config/angular.php`.

```php
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
```

#### bind_ng_constant_to_this_view

You need to update this file to specify which view you want your Angular constant to be prepended to. Typically, your footer is a good place for this.

If you include something like a `layouts/partials/footer` partial, where you store your footer and script references, then make the `bind_ng_constant_to_this_view` key equal to that path. Behind the scenes, Laravel will listen for when that view is composed, and prepend the Angular constant to it.

## License

The MIT License (MIT)

Copyright (c) 2015 Mike McLin

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
