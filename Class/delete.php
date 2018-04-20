<?php
include_once 'DBConfig.php';

class Delete extends DBConfig
{
    public function __construct()
        {
            parent::__construct();
        }
    public function delete($id, $table) 
    { 
        $query = "DELETE FROM $table WHERE id = $id";
        
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
