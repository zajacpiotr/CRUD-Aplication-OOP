<?php
include_once("Class/select.php");
$select = new Select();

$read = $select->read();

 foreach ($read as $key => $res) {         
                echo "<div class='row'>";
                echo "<div class='cell'>".$res['id']."</div>";
                echo "<div class='cell'>".$res['first_name']."</div>";
                echo "<div class='cell'>".$res['last_name']."</div>";  
                echo "</div>";
                        }
 
?>
