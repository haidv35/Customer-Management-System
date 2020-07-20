<?php

namespace App\Controllers;

use App\Models\Login;

class LoginController extends BaseController
{
    private $login;

    public function __construct()
    {
        parent::__construct();
        $this->login = new Login();
    }

    public function checkLogin()
    {
        if (empty($_POST['username']) || empty($_POST['password'])) {
            $_SESSION['errors'] = "Bạn chưa nhập đầy đủ thông tin!";
            return $this->back();
        }
        $login = $this->login->checkLogin($_POST['username'], $_POST['password']);
        if ($login === 101) {
            $_SESSION['errors'] = "Tài khoản hoặc mật khẩu chưa đúng!";
            return $this->back();
        }
        if ($login === 102) {
            $_SESSION['errors'] = "Tài khoản của bạn không có quyền truy cập vào đây!";
            return $this->back();
        }
        $_SESSION['USER_ID'] = hash('sha256', $login->id . $login->username . $login->password);
        setcookie('USER_ID', $_SESSION['USER_ID'], time() + (86400 * 30), '/');
        setcookie('USER', $login->username, time() + (86400 * 30), '/');

        return $this->back();
    }

    function loggedIn()
    {
        if (!isset($_SESSION['USER_ID']) && isset($_COOKIE['USER_ID'])) {
            $_SESSION['USER_ID'] = $_COOKIE['USER_ID'];
        }
        return isset($_SESSION['USER_ID']);
    }
}
