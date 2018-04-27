<?php

include_once("Class/Crud.php");
include_once("Class/validation.php");

$name = $lastName = "";
$nameErr = $lastNameErr = $error = $msg = $errorMsg = $insertMsg = ""; 

$crud = new Crud();

$id = $_GET['id'];
$stmt = $crud->select($id);
 
foreach ($stmt as $res) {
    $namePH = $res['first_name'];
    $lastNamePH = $res['last_name'];
}
?>
    <html>

    <head>
        <title>Edit Data</title>
    </head>

    <body>
        <a href="index.php">Home</a>
        <br/><br/>

        <form name="formSecond" method="post" action="edit.php">
            <table>
                <tr>
                    <td>First Name</td>
                    <td><input type="text" name="name" value="<?php echo $namePH;?>"></td>
                </tr>
                <span class="error"><?php echo $nameErr; ?></span>
                <tr>
                    <td>Last Name</td>
                    <td><input type="text" name="lastName" value="<?php echo $lastNamePH;?>"></td>
                </tr>
                <span class="error"><?php echo $lastNameErr; ?></span>
                <tr>
                    <td><input type="hidden" name="id" value="<?php echo $_GET[ 'id'];?>"></td>
                    <td><input type="submit" name="update" value="Update"></td>
                </tr>
            </table>
        </form>
    </body>

    </html>
    <?php
if(isset($_POST['update'])) {
    $validation = new Validation();
 
    $name = $_POST['name'];
    $lastName = $_POST['lastName'];
    
    $msg = $validation->checkEmpty($_POST, array('name', 'lastName'));
    $check_name = $validation->isValid($_POST['name']);
    $check_lastName = $validation->isValid($_POST['lastName']);
    
    if($msg != null) {
        $errorMsg= $msg; 
    } elseif (!$check_name) {
        $nameErr = 'Please enter correct First Name';
    } elseif (!$check_lastName) {
        $lastNameErr = 'Please enter correct Last Name.';
    } else { 
        $query = "SELECT * FROM persons WHERE first_name = '$name' AND last_name= '$lastName'";
        $stmt = $validation->read($query);
        if ($stmt) {
           $error= 'Taki sprzedawca znajduje się juz w bazie';
       } if(empty($error)) {
}
    }
}

?>
