<?php

namespace App\Models;

use App\Models\Database;

class Transaction
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function create($data)
    {
        $query = "INSERT INTO transactions(price,quantity,created_at,product_id,user_id) VALUES(:price,:quantity,:created_at,:product_id,:user_id)";
        return $this->db->create($query, $data);
    }

    public function get()
    {
        $query = "SELECT transactions.*,transactions.id as transaction_id,transactions.created_at as transaction_created_at,products.*,users.* FROM transactions JOIN users ON transactions.user_id = users.id JOIN products ON products.id = transactions.product_id";
        return $this->db->all($query);
    }

    public function getProfit()
    {
        $query = "SELECT MONTH(created_at) AS MONTH,SUM(price*quantity) AS TOTAL FROM transactions GROUP BY MONTH";
        return $this->db->all($query);
    }
}
