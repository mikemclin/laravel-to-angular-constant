<?php

namespace MikeMcLin\Angular;

class LaravelToAngularConstant
{
    /**
     * The module to nest the constants under.
     *
     * @var string
     */
    protected $module;

    /**
     * What binds the variables to the views.
     *
     * @var \MikeMcLin\Angular\ViewBinder
     */
    protected $viewBinder;

    /**
     * The name of the constant.
     *
     * @var string
     */
    private $constant;

    /**
     * Create a new Angular transformer instance.
     *
     * @param ViewBinder $viewBinder
     * @param string     $module
     * @param string     $constant
     */
    function __construct(ViewBinder $viewBinder, $module = 'app', $constant = 'DATA')
    {
        $this->viewBinder = $viewBinder;
        $this->module = $module;
        $this->constant = $constant;
    }

    /**
     * Bind the given array of variables to the view.
     *
     * @param array $variables
     */
    public function put(array $variables)
    {
        // First, we have to translate the variables
        // to something JS-friendly.
        $js = $this->buildNgConstant($variables);
        // And then we'll actually bind those
        // variables to the view.
        $this->viewBinder->bind($js);
    }

    /**
     * Translate PHP vars array to an Angular constant.
     *
     * @param  array $vars
     *
     * @return string
     */
    protected function buildNgConstant($vars)
    {
        $js = "angular.module('{$this->module}', [])";
        $js .= ".constant('{$this->constant}', {$this->jsonEncode($vars)});";

        return $js;
    }

    /**
     * Returns the JSON representation of a value
     *
     * @param  mixed $value
     *
     * @return string
     */
    protected function jsonEncode($value)
    {
        return json_encode($value);
    }

}
