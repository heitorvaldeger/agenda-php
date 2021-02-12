<?php

class ConnectionDatabase {
    private static $connection;

    private function __construct(){
        
    }

    public static function getConnection (ConnectionFactory $connectionFactory) {
        if (!self::$connection) {

            try {
                self::$connection = $connectionFactory->make();
            } catch (Exception $e) {
                throw new Exception($e->getMessage());
            }
        }

        return self::$connection;
    }
}