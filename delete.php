<?php
include_once("Class/Crud.php"); 

$crud = new Crud();
session_start();
if(!isset($_SESSION["sessionVar"])) {
    header("Location:table.php");
} else {

    $id= $_GET['id'];
    $stmt = $crud->delete($id);

    if ($stmt) {
        header("Location:table.php");
        }
    } 
    
?>
