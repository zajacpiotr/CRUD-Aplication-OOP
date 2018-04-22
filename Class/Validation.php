<?php
include_once 'DbConfig.php';

class Validation extends DBConfig
{
    public function __construct()
    {
        parent::__construct();
    }
    public function check_empty($data, $fields) 
    {
        $msg= null;
        foreach ($fields as $value) {
            if (empty($data[$value])) {
                $msg .= "$value puste <br />";
            }
        }
        return $msg;
    }
    public function is_valid($field)
    {
        if (preg_match("/^[a-zA-Z\s]+/", $field)) {
            if(strlen($field)>2) {
            return true;
            }
        } 
        return false;
    }