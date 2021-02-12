<?php

use PDO;

class MysqlConnection implements ConnectionFactory {
    public function make () {
        $connection = new PDO('mysql:host=' . DB_HOST . ';' . 'dbname=' . DB_DATABASE,
        DB_USERNAME, DB_PASSWORD);

        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $connection;
    }
}