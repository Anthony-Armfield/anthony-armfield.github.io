<?php
/**
 * Created by PhpStorm.
 * User: tarmfield
 * Date: 9/13/2018
 * Time: 10:16 PM
 */

class Database {
    private static $dsn = 'mysql:host=localhost;dbname=form_140';
    private static $username = 'root';
    private static $password = 'Pa$$w0rd';
    private static $db;

    private function __construct() {}

    public static function getDB () {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn,
                    self::$username,
                    self::$password);
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                include('../errors/database_error.php');
                exit();
            }
        }
        return self::$db;
    }
}
?>