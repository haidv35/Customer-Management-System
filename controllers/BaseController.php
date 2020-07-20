<?php

namespace App\Controllers;

class BaseController
{
    public function __construct()
    {
        @session_start();
    }

    public function view($file, $data = array())
    {
        $view_file = getcwd() . '/views/' . $file . '.php';
        if (!file_exists($view_file) && !is_file($view_file)) {
            die();
        }
        extract($data);
        require_once($view_file);
        die();
    }

    public function back()
    {
        $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
        header("Location: " . $url);
        exit;
    }
}
