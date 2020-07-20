<?php

namespace App\Models;

use PDO;

class Database
{
    private static $instance;

    public function __construct()
    {
        require_once __DIR__ . '/../config.php';
        $connect_string = 'mysql:dbname=' . DATABASE_NAME . ';host=' . HOST . ';port=' . PORT . ';charset=' . CHARSET;
        try {
            self::$instance = new PDO($connect_string, USER, PASS);
        } catch (\PDOException $e) {
            echo "Kết nối thất bại";
            die();
        }
        return self::$instance;
    }

    public function first($query, $params = array())
    {
        $sql = self::$instance->prepare($query);
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $sql->execute($params);
        return $sql->fetch();
    }

    public function all($query, $params = array())
    {
        $sql = self::$instance->prepare($query);
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $sql->execute($params);
        return $sql->fetchAll();
    }

    public function create($query, $params = array())
    {
        $sql = self::$instance->prepare($query);
        return ($sql->execute($params)) ? 200 : 404;
    }
    public function update($query, $params = array())
    {
        $sql = self::$instance->prepare($query);
        return ($sql->execute($params)) ? 200 : 404;
    }

    public function delete($query, $id)
    {
        $sql = self::$instance->prepare($query);
        return ($sql->execute($id)) ? 200 : 404;
    }
}
