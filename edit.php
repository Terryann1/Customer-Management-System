<?php
$name = "";
$email = "";
$phone = "";
$address = "";
$id = "";
$error_message = "";
$success_message = "";
if($_SERVER['REQUEST_METHOD=="GET"']){
    //GET method:show data of the client
    if(isset($_GET[$id])){
       $header("location: /CUSTOMER_MANAGEMENT_SYSTEM/index.php");
        exit;
    }
    $id = $_GET["id"];
    //read the row of the selected customer
    $sql = "SELECT * FROM CUSTOMER WHERE id=$id";
    $result =$connection->query($sql);
    $row = $result->fetch_assoc();
    if(!$row){
        $header("location: /CUSTOMER_MANAGEMENT_SYSTEM/index.php");
        exit;
}
    $name = $row['name'];
    $email = $row['email'];
    $phone = $row['phone'];
    $address = $row['address'];
}
else{
    //POST method:update data of the customer
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    do {
        if (empty($id) || empty($name) || empty($email) || empty($phone) || empty($address)) {
            $error_message = "All fields are required";
            break;
        }
        $sql = "UPDATE customer" .
        "SET name='$name',email='$email',phone='$phone',address='$address'" 
        . "WHERE id=$id";
        $result = $connection->query($sql);
        if(!$result){
            $error_message = "invalid query" . $connection->error;
            break;
        }
        $success_message = "client updated successfully";
        $header("location: /CUSTOMER_MANAGEMENT_SYSTEM/index.php");
        exit;
   }while (false);
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
    //if(!empty($error_message)){
        echo "
      //  <div class='alert alert-warning alert-dismissible fade show' role='alert'>
       // <strong>$error_message</strong>
      //  <button type='button' class='btn-close' data-bs-dismissible='alert'aria-label='close'></button>
        </div>";
  //  }
    ?>
    <form name="form" method="post" action="">
    <input type="hidden" name="new" value="1"/>
        <input name="id" type="hidden" value="<?php echo "$row[$id]"; ?>"/>
        <div class="row mb-3">
        <label class col sm-3 col-form-label>Name</label>
        <div class="col-sm-6">
        <input type="text" class="form-control" name="name" values="<?php echo"$name"; ?>">
        <p><input name="submit" type="submit" value="Edit"/></p>
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