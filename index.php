<?php
include_once("Class/Crud.php");
include_once("Class/validation.php");
include_once("layout_header.php");
include_once("Class/DBConfig.php");

$crud = new Crud();
session_start();
if(isset($_SESSION["sessionVar"])){
session_destroy();
}
$name = $lastName = "";
$nameErr = $lastNameErr = $error = $msg = $errorMsg = $insertMsg = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
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
           $error= 'This person is actually in database';
       } if(empty($error)) {
            $stmt = $crud->insert($name, $lastName);
            if($stmt){
                $insertMsg= "This person added to database";
            }
        }
    }
}
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
            <a href="table.php">Show database</a>
        </div>
    </form>
