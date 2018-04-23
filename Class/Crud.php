<?php
include_once ("DBConfig.php");

class Crud extends DBConfig
{
    public function __construct()
    {
        parent::__construct();
    }
    public function readAll()
    {
        $query = "SELECT * FROM persons";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        
        return $stmt;
    }
    public function read()
    {
        $query = "SELECT * FROM persons";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        
        return true;
    }
    public function delete($id) 
    { 
        $query = "DELETE FROM persons WHERE id = $id";
        
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
    
        if ($stmt == false) {
            echo 'Error: cannot delete id ' . $id . ' from table ' . $table;
            return false;
        } else {
            return true;
        }
    }
}
?>
