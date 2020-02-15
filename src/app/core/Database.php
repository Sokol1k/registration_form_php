<?php

namespace App\Core;

use PDO;

class Database
{
    private static $_instance;
    private static $DB;

    private function __construct()
    {
        try {
            self::$DB = new PDO(
                "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME,
                DB_USER,
                DB_PASSWORD,
                [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"]
            );
        } catch (PDOException $e) {
            echo "Connection failed: " . $e . getMessage();
        }
    }

    private function __clone()
    {
        //
    }

    private function __wakeup()
    {
        //
    }

    public static function getInstance()
    {
        if (!self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public static function insert($table, $data)
    {
        $columns = [];
        $values = [];

        foreach ($data as $key => $value) {
            $columns[] = "$key";
            $values[] = ":" . $key;
        }

        $columns = implode(", ", $columns);
        $values = implode(", ", $values);

        $sql = "INSERT INTO $table ($columns) VALUES ($values);";

        $statement = self::$DB->prepare($sql);

        $res = $statement->execute($data);

        return ($res) ? true : false;
    }

    public static function select($table, $data, $columns, $where = null, $order = null)
    {
        if ($columns == null) {
            $sql = "SELECT COUNT(*) AS count FROM $table";
        } else if ($columns[0] == "*") {
            $sql = "SELECT * FROM $table";
        } else {
            $columns = implode(",", $columns);
            $sql = "SELECT $columns FROM $table";
        }

        if ($where) $sql .= " WHERE " . $where . ";";
        if ($order) $sql .= " ORDER BY " . $order;

        $res = [];
        $statement = self::$DB->prepare($sql);
        $statement->execute($data);
        $res = $statement->fetchAll(PDO::FETCH_ASSOC);

        return ($res) ? $res : false;
    }

    public static function update($table, $data, $where) 
    {
        $columns = [];

        foreach ($data as $key => $value) {
            $columns[] = $key . "= :" . $key;
        }

        $columns = implode(", ", $columns);

        $sql = "UPDATE $table SET $columns WHERE $where";
        $statement = self::$DB->prepare($sql);
        $res = $statement->execute($data);

        return ($res) ? true : false;
    }
}
