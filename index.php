<?php
include_once("Class/Crud.php");
include_once("layout_header.php");

$crud = new Crud();

$read = $crud->read();
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
     echo "</div>";
$name = $lastName = "";
$nameErr = $lastNameErr = $error = $msg = $errorMsg = $insertMsg = "";
?>
    <form action="index.php" method="post">
        <div class="form-group">
            <p>Add to the database.</p>
            <p>
                <label for="inputName">First Name:<sup>*</sup></label>
                <input type="text" name="name" class="form-control" id="inputName" value="<?php echo $name; ?>">
                <span class="error"><?php echo $nameErr; ?></span>
            </p>
            <p>
                <label for="inputLastName">Last Name:<sup>*</sup></label>
                <input type="text" name="lastName" class="form-control" id="inputLastName" value="<?php echo $lastName; ?>">
                <span class="error"><?php echo $lastNameErr; ?></span>
            </p>
            <input type="submit" value="Add" class="btn btn-primary">
            <p class="success">
                <?php echo $insertMsg?>
            </p>
            <p class="error">
                <?php echo $error;
                    echo $errorMsg?>
            </p>
        </div>
    </form>
