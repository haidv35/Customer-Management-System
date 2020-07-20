<?php

namespace App\Controllers;

class ErrorController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return $this->view('404');
    }
}
