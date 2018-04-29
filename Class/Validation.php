<?php
include_once ("DbConfig.php");

class Validation extends DBConfig
{
    public function __construct()
    {
        parent::__construct();
    }
    public function checkEmpty($data, $fields) 
    {
        $msg= null;
        foreach ($fields as $value) {
            if (empty($data[$value])) {
                $msg .= "$value empty <br />";
            }
        }
        return $msg;
    }
    public function isValid($field)
    {
        if (preg_match("/^[a-zA-ZąęćżźńłóśĄĆĘŁŃÓŚŹŻ\s]+$/", $field)) {
            if(strlen($field)>2) {
            return true;
            }
        } 
        return false;
    }
    public function read($query)
    {
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        foreach ($stmt as $key => $res) {
            if (count($res)>0) {
                return true;
            } else {
                return false;
            }
            
        }
        
    }
}
