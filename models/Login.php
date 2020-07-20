<?php

namespace App\Models;

use App\Models\Database;

class Login
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function checkLogin($username, $password)
    {
        $hash_password = hash('sha256', $password);
        $query = "SELECT * FROM users WHERE username=:username && password=:password";
        $params = ['username' => $username, 'password' => $hash_password];
        $users = $this->db->first($query, $params);
        if ($users === false) {
            return 101;
        }
        if ($users->role_id == 2) {
            return 102;
        }
        return $users;
    }
}
