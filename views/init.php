<?php

session_start();

define('DB_DRIVER', 'sqlite');
define('DB_DATABASE', '/home/heitor/apps/agenda/database/agenda.sqlite');
define('DB_USERNAME', '');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');

function myAutoload ($className) {

    $dirs[] = '../../database/';
    $dirs[] = '../../database/connections/';
    $dirs[] = '../../models/';
    $dirs[] = '../../repository/';
    $dirs[] = '../../repository/contracts/';
    $dirs[] = '../../services/';
    $dirs[] = '../../utils/';

    foreach ($dirs as $dir) {
        $file = $dir . $className . '.class.php';
        if (file_exists($file))
        {
            require_once $file;
        }
    }
}

spl_autoload_register("myAutoload");

$flashAlertMessage = new FlashAlertMessage();

$sqliteConnection = new SqliteConnection();
$connectionDatabase = ConnectionDatabase::getConnection($sqliteConnection);

$contatoRepository = new ContatoRepository($connectionDatabase);
$contatoService = new ContatoService($contatoRepository);