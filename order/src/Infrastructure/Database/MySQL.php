<?php

namespace App\Infrastructure\Database;

/**
 * Class MySQL
 *
 * @package App\Infrastructure\Database
 */
final class MySQL
{
    public function connect()
    {
        $servername = "mysql-order";
        $username = "root";
        $password = "dev";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=order", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
            return $conn;
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
