<?php

namespace App\Core;

class Controller
{

    public $model;
    public $view;

    function __construct($controller = "")
    {
        $this->view = new View($controller);
    }
}
