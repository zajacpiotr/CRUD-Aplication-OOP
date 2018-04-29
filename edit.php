<?php

include_once("Class/Crud.php");
include_once("Class/validation.php");

$crud = new Crud();
$validation = new Validation();
session_start();
if(!isset($_SESSION["sessionVar"])) {
    header("Location:table.php");
} else {
    if(!isset($_POST['update'])) {
        $nameErr = $lastNameErr = $error = $msg = $errorMsg = $insertMsg = "";

        session_start();
        $id = $_GET['id'];
        $_SESSION["idM"] = $id;
        $stmt = $crud->select($id);

        foreach ($stmt as $res) {
            $_SESSION["namePH"] = $res['first_name'];
            $_SESSION["lastNamePH"] = $res['last_name'];
        }
    }

    if(isset($_POST['update'])) {
        $nameErr = $lastNameErr = $error = $msg = $errorMsg = $insertMsg = "";

        session_start();
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
                $stmt = $crud->update($name, $lastName, $_SESSION["idM"]);
                if($stmt){
                    $insertMsg= "Sprzedwca zaaktualizowany";
                    header("Location: table.php");
                    session_destroy();
                }
            }   
        }
    }
}
?>
    <html>

    <head>
        <title>Edit Data</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link type="text/css" rel="stylesheet" href="css/style.css" />
    </head>

    <body>
        <form name="formSecond" method="post" action="edit.php">
            <div class="form-group">
                <p>Update.</p>
                <p>
                    <label for="inputName">First Name:<sup>*</sup></label>
                    <input type="text" name="name" class="form-control" id="inputName" value="<?php echo $_SESSION['namePH'];?>">
                    <span class="error"><?php echo $nameErr; ?></span>
                </p>
                <p>
                    <label for="inputLastName">Last Name:<sup>*</sup></label>
                    <input type="text" name="lastName" class="form-control" id="inputLastName" value="<?php echo $_SESSION['lastNamePH'];?>">
                    <span class="error"><?php echo $lastNameErr; ?></span>
                </p>
                <input type="hidden" name="id" value="<?php echo $_GET[ 'id'];?>">
                <input type="submit" name="update" value="Update" class="btn btn-primary">
                <p class="success">
                    <?php echo $insertMsg?>
                </p>
                <p class="error">
                    <?php echo $error;
                    echo $errorMsg?>
                </p>
                <br/><br/>
                <a href="index.php">Home</a>

            </div>
        </form>
    </body>

    </html>
