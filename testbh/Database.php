<?php

class Database
{
    static $instance;

    public function __construct()
    {

    }

    public static function getInstances()
    {
        if (empty(self::$instance)) {
            $config = [
                'host' => 'testbh-db',
                'port' => 5432,
                'dbname' => 'test_db',
            ];
            $configAdd = [
                'db_user' => 'postgres',
                'db_password' => 'test_password'
            ];
            try {
                $dsn = "pgsql:".http_build_query($config, '', ';');

                // make a database connection
                self::$instance = new PDO(
                    $dsn,
                    $configAdd['db_user'],
                    $configAdd['db_password'],
                    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
                );

            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return self::$instance;
    }
}
