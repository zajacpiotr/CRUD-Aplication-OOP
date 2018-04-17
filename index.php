<?php
include_once("Class/select.php");
include_once("layout_header.php");

$select = new Select();

$read = $select->read();
echo "<table width='80%' border=0>";
     echo "<tr bgcolor='#CCCCCC'>";
     echo "<td>ID</td>";
     echo "<td>First Name</td>";
     echo "<td>Last Name</td>";
     echo "</tr>";

foreach ($read as $key => $res) { 
     echo "<tr>";
     echo "<td>".$res['id']."</td>";
     echo "<td>".$res['first_name']."</td>";
     echo "<td>".$res['last_name']."</td>"; 
     echo "</tr>";
}
     echo "</table>";
$name = $lastName = "";
$nameErr = $lastNameErr = $error = $msg = $errorMsg = $insertMsg = "";
?>
    <form action="index.php" method="post">
        <div class="form-group">
            <p>Wrzuć sprzedawcę do bazy danych.</p>
            <p>
                <label for="inputName">Imie:<sup>*</sup></label>
                <input type="text" name="name" class="form-control" id="inputName" value="<?php echo $name; ?>">
                <span class="error"><?php echo $nameErr; ?></span>
            </p>
            <p>
                <label for="inputLastName">Nazwisko:<sup>*</sup></label>
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
