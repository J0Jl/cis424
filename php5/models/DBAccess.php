<?php

/**
 * PDO access to MySQL; only one connection is allowed (using the singleton
 * pattern).
 * 
 * @author jam
 * @version 170709 
 */
class DBAccess {

    private $connection;
    
    // Store the single instance.
    private static $instance;

    /**
     * Get an instance of the DBAccess class if one has not yet been obtained.
     * @return DBAccess 
     */
    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Constructor creates a connection to the database.
     */
    public function __construct() {
        $dsn = 'mysql:host=localhost;dbname=my_guitar_shop1';
        $username = 'mgs_user';
        $password = 'pa55word';
        try {
            $this->connection = new PDO($dsn, $username, $password);

            // Set the following attributes to have MySQL return proper data types.
            // Otherwise all queries will return strings.
            $this->connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $this->connection->setAttribute(PDO::ATTR_STRINGIFY_FETCHES, false);
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include('views/database_error.php');
            exit();
        }
    }

    /**
     * Empty clone magic method to prevent duplication - only want one instance
     * of this class avaliable to the application. 
     */
    private function __clone() {
        
    }

    /**
     * Get the PDO MySQL connection. 
     */
    public function getConnection() {
        return $this->connection;
    }

}
