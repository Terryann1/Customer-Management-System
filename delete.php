<!DOCTYPE html>
<html>
    <body>
<form name="form" method="post" action="">
    <input type="hidden" name="new" value="1"/>
  <input name="id" type="hidden" value="Delete"/>
        <div class="row mb-3">
        <label class col sm-3 col-form-label>Name</label>
        <div class="col-sm-6">
        <p><input name="submit" type="submit" value="Delete"/></p>
        </div>
</body>
        </html>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $username = "root";
    $database = "customer management system";
    $password = "";
    //connect to database
    $connection = new $mysqli($servername, $username, $database, $password);
    $sql = "DELETE FROM customer WHERE id=$id";
    $connection->query($sql);
}
$header("location: /Customer_management_system/index.php");
exit;
?>