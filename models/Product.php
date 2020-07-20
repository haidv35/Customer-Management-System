<?php

namespace App\Models;

use App\Models\Database;

class Product
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function create($data)
    {
        $query = "INSERT INTO products(type,name,price,des) VALUES(:type,:name,:price,:des)";
        return $this->db->create($query, $data);
    }
    public function first($id)
    {
        $query = "SELECT * FROM products WHERE id=:id";
        return $this->db->first($query, $id);
    }
    public function get()
    {
        $query = "SELECT * FROM products";
        return $this->db->all($query);
    }
    public function update($data)
    {
        $query = "UPDATE products SET type=:type,name=:name,price=:price,des=:des WHERE id=:id";
        return $this->db->update($query, $data);
    }

    public function delete($id)
    {
        $query = "DELETE FROM products WHERE id=:id";
        return $this->db->delete($query, $id);
    }
}
