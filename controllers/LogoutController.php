<?php

namespace App\Controllers;


class LogoutController extends BaseController
{
    public function logout()
    {
        unset($_SESSION['USER_ID']);
        setcookie("USER_ID", "", time() - (86400 * 30));
        return $this->back();
    }
}
