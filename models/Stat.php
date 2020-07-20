<?php

namespace App\Models;

use App\Models\Database;

class Stat
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
}
