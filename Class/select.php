<?php
include_once 'DBConfig.php';

class Select extends DBConfig
{
    public function __construct()
    {
        parent::__construct();
    }
    public function read()
    {
        $query = "SELECT * FROM persons";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        
        return $stmt;
    }
}
?>
