<?php
include_once("Class/Crud.php");
include_once("layout_header.php");

$crud = new Crud();
$read = $crud->readAll();

echo "<div id='conteiner'>";
    echo "<table>";
         echo "<tr>";
         echo "<td>ID</td>";
         echo "<td>First Name</td>";
         echo "<td>Last Name</td>";
         echo "<td>Actions</td>";
         echo "</tr>";

    foreach ($read as $key => $res) { 
         echo "<tr>";
         echo "<td>".$res['id']."</td>";
         echo "<td>".$res['first_name']."</td>";
         echo "<td>".$res['last_name']."</td>"; 
         echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>"; 
    }
    echo "</table>";
echo "<a href='index.php'>Go back</a>";
echo "</div>";

?>
