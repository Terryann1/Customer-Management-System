<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $database = "customer management system";
   //create connection with the database
 $connection = new $mysqli($servername, $username, $password, $database);
$name="";
$email = "";
$phone = "";
$address = "";
$error_message ="";
$success_message="";
if($_SERVER['REQUEST_METHOD']=='POST'){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone =$_POST ["phone"];
    $address =$_POST ["address"];
    do {
        if (empty($name) || empty($email) || empty($phone) || empty($address)) {
            $error_message = "All fields are required";
            break;
        }
        
    //Add new customer to database
    $sql="INSERT INTO customer(name,email,phone,address)"."VALUES('$name','$email','$phone','$address')";
    $result=$connection->query($sql);
    if(!$result){
        $error_message = "invalid query" . $connection->error;
        break;
    }
    $name="";
    $email="";
    $phone="";
    $address="";
    $success_message = "Customer added correctly";
        $header("location:/CUSTOMER_MANAGEMENT_SYSTEM/index.php");
        exit;
    }while(false);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Customer management system</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
<div class="container my-5">
    <h2>New customer</h2>
    <?php
    if(!empty($error_message)){
        echo "
        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>$error_message</strong>
        <button type='button' class='btn-close' data-bs-dismissible='alert'aria-label='close'></button>
        </div>";
    }
    ?>
    <form method="post">
        <div class="row mb-3">
        <label class col sm-3 col-form-label>Name</label>
        <div class="col-sm-6">
        <input type="text" class="form-control" name="name" values="<?php echo"$name"; ?>">
        </div>
</div>
        <div>
        <label class col sm-3 col-form-label>Email</label>
        <div class="col-sm-6">
        <input type="text" class="form-control" name="email" values="<?php echo"$email";?>">
        </div>
</div>
       <div>
       <label class col sm-3 col-form-label>phone</label>
       <div class="col-sm-6">
        <input type="text" class="form-control" name="phone" values="<?php echo"$phone";?>">
       </div>
</div>
       <div>
       <label class col sm-3 col-form-label>Adress</label>
       <div class="col-sm-6">
        <input type="text" class="form-control" name="address" values="<?php echo"$address";?>">
</div>
</div>
        <?php
        if(!empty($success_message)){
            echo "
            <div class='row mb-3'>
            <div class='offset-sm-3 col-sm-6'>
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>$success_message</strong>
            <button type='button' class='btn-close' data-bs-dismissible='alert' aria-label='close'></button>
            </div>
            </div>
            </div>";
        }
        ?>
       <div class="row mb-3">
        <div class="offset-sm-3 col-sm-3" d-grid>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <div class="col-sm-3 d-grid">
            <a class="btn btn-outline-primary" href="/CUSTOMER_MANAGEMENT_SYSTEM/index.php">Cancel</a>
        </div>
       </div>
    </form>
</div>
    </body>
</html>