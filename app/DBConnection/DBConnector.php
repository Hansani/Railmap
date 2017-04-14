<?php
namespace  App\DBConnection;
/**
 * Created by PhpStorm.
 * User: Hansi
 * Date: 14/04/2017
 * Time: 09:34
 */

class DBConnection{
    private static $mysqli_connection;
    
//    public static function getDatabase(){
//        if (DBConnection::$mysqli_connection===null){
//            $config = parse_ini_file(__DIR__.'/../../database/config.ini');
//            DBConnection::$mysqli_connection = mysqli_connect($config[DB_HOST], $config[DB_USERNAME],$config[DB_PASSWORD],$config[DB_DATABASE]);
//            if (DBConnection::$mysqli_connection === false){
//                DBConnection::$mysqli_connection==null;
//            }
//        }
//        return DBConnection::$mysqli_connection;
//    }

    public static function getDatabase()
    {
        if (DBConnector::$mysqli_connection === null) {
            $config = parse_ini_file(__DIR__ . '/../../database/config.ini');
            DBConnector::$mysqli_connection = mysqli_connect($config['DB_HOST'], $config['DB_USERNAME'], $config['DB_PASSWORD'], $config['DB_DATABASE']);

//          DBConnector::$mysqli_connection = mysqli_connect(Config::get('connections.mysql.host'), Config::get('connections.mysql.username'), Config::get('connections.mysql.password'), Config::get('connections.mysql.database'));

            if (DBConnector::$mysqli_connection === false) {
                DBConnector::$mysqli_connection = null;
            }
        }
        return DBConnector::$mysqli_connection;
    }
}