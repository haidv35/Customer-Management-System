<?php

namespace App\Models;

use App\Models\Database;

class Customer
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function first($id)
    {
        $query = "SELECT * FROM users WHERE id=:id && role_id=2";
        return $this->db->first($query, $id);
    }
    public function get()
    {
        $query = "SELECT * FROM users WHERE role_id=2";
        return $this->db->all($query);
    }

    public function create($data)
    {
        $query = "INSERT INTO users(username,password,firstname,lastname,dob,email,phone,address,created_at,role_id) VALUES(:username,:password,:firstname,:lastname,:dob,:email,:phone,:address,:created_at,:role_id)";
        return $this->db->create($query, $data);
    }
    public function update($data)
    {
        $query = "UPDATE users SET username=:username,password=:password,firstname=:firstname,lastname=:lastname,dob=:dob,email=:email,phone=:phone,address=:address,updated_at=:updated_at,role_id=:role_id WHERE id=:id";
        return $this->db->update($query, $data);
    }

    public function delete($id)
    {
        $query = "DELETE FROM users WHERE id=:id";
        return $this->db->delete($query, $id);
    }
    public function parseJsonData()
    {
        $query = "SELECT users.*, tr.order_count, tr.total_spend FROM users LEFT JOIN (SELECT user_id,COUNT(id) AS order_count,SUM(price*quantity) AS total_spend FROM transactions GROUP BY user_id) tr ON tr.user_id = users.id WHERE role_id = 2";
        return $this->db->all($query);
    }
}
