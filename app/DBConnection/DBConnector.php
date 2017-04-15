<?php
namespace App\DBConnection;
/**
 * Created by PhpStorm.
 * User: Hansi
 * Date: 14/04/2017
 * Time: 09:34
 */

class DBConnector
{
    private static $mysqli_connection;

    public static function getDatabase()
    {
        if (DBConnector::$mysqli_connection === null) {
            $config = parse_ini_file(__DIR__ . '/../../database/config.ini');
            DBConnector::$mysqli_connection = mysqli_connect($config['DB_HOST'], $config['DB_USERNAME'], $config['DB_PASSWORD'], $config['DB_DATABASE']);
            if (DBConnector::$mysqli_connection === false) {
                DBConnector::$mysqli_connection = null;
            }
        }
        return DBConnector::$mysqli_connection;
    }
}