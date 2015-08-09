<?php
/**
 * Forked from: https://github.com/laracasts/PHP-Vars-To-Js-Transformer/blob/2.0/src/ViewBinder.php
 */

namespace MikeMcLin\Angular;

interface ViewBinder
{
    /**
     * Bind the JavaScript variables to the view.
     *
     * @param string $js
     */
    public function bind($js);
} 
