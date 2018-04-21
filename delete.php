<?php
include_once("Class/Crud.php");

$crud = new Crud();

$id= $_GET['id'];
$stmt = $crud->delete($id);

if ($stmt) {
    header("Location:index.php");
}
    
?>
