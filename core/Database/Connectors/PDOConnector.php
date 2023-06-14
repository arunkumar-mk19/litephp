<?php

declare(strict_types=1);

namespace Core\Database\Connectors;

class PDOConnector
{
    private static $localhost;

    private static $username;
    
    private static $password;
    
    private static $database;
    
    private static $instance = null;

    protected static $options = [
        \PDO::ATTR_CASE => \PDO::CASE_NATURAL,
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_ORACLE_NULLS => \PDO::NULL_NATURAL,
        \PDO::ATTR_STRINGIFY_FETCHES => false,
        \PDO::ATTR_EMULATE_PREPARES => false,
        \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        \PDO::ATTR_PERSISTENT => true
    ];

    protected function __construct($localhost = '', $database = '', $username = '', $password = '')
    {
        self::$localhost = $localhost;
        self::$username = $username;
        self::$password = $password;
        self::$database = $database;
    }

    public function __clone(){
        throw new \Exception("You can't clone the database connection object.");
    }

    public function __wakeup() {}

    /**
     * Points the class, singleton.
     *
     * @access public
     * @since  1.0.0
     */
    public static function getInstance(): string | \PDO
    {
        if (self::$instance === null) {
            try {
                self::$instance = new \PDO("mysql:host=" . self::$localhost . ";dbname=" . self::$database, self::$username, self::$password, self::$options);
            } catch (\PDOException $e) {
                return "ERROR: Failed to connect to MySQL: " . $e->getMessage();
            }
        }

        return self::$instance;
    }
}