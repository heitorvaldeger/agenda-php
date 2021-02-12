<?php

use PDO;

class SqliteConnection implements ConnectionFactory {
    public function make () {
        $connection = new PDO('sqlite:' . DB_DATABASE);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $connection;
    }
}