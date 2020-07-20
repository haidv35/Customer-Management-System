<?php

namespace App\Models;

use App\Models\Database;

class Dashboard
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
        if ($users->role_id == 1) {
            return $users;
        }
        return 102;
    }

    public function getTotalProductSold()
    {
        $query = "SELECT SUM(quantity) AS total FROM transactions";
        return $this->db->first($query);
    }

    public function getTotalRevenue()
    {
        $query = "SELECT SUM(price*quantity) AS total FROM transactions";
        return $this->db->first($query);
    }

    public function getTotalCustomer()
    {
        $query = "SELECT COUNT(id) AS total FROM users WHERE role_id=2";
        return $this->db->first($query);
    }

    public function getProductSold()
    {
        $query = "SELECT * FROM transactions";
        return $this->db->all($query);
    }

    public function getCustomer()
    {
        $query = "SELECT * FROM users";
        return $this->db->all($query);
    }
}
