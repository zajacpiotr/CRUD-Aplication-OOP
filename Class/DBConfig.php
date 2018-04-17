<?php
class DbConfig 
{    
    private $_host = 'localhost';
    private $_username = 'root';
    private $_password = '';
    private $_database = 'demo';
    
    protected $connection;
    
    public function __construct()
    {
        $this->connection = null;
        try {
            $this->connection = new PDO("mysql:host=" . $this->_host . ";dbname=" . $this->_database, $this->_username, $this->_password);
            
        }catch(PDOException $exception){
                echo "Connection error: " . $exception->getMessage();
        }           
        return $this->connection;
    }
}
?>
