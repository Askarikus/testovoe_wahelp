<?php

class Database
{
    static $instance;

    public function __construct()
    {       
             
    }

    public static function getInstances()
    {
        var_dump(self::$instance);
        if (empty(self::$instance)) {
            // echo "PDO is empty \n";
            $host = 'testbh-db';
            $db = 'test_db';
            $user = 'postgres';
            $password = 'test_password';
            try {
                $dsn = "pgsql:host=$host;port=5432;dbname=$db;";

                // make a database connection
                self::$instance = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

                if (self::$instance) {
                    echo "Connected to the $db database successfully! \n";
                    var_dump(self::$instance);
                }
            } catch (PDOException $e) {
                die($e->getMessage());
            }                  
        }
        return self::$instance;
    }
}
