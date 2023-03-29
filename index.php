<!DOCTYPE html>
<html>
    <head>
        <title>Customer Management System</title>
        <link rel="stylesheet" href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css'>
    </head>
    <body>
        <div class="container my-5">
            <h2>List of customers</h2>
            <a class="btn btn-primary", href='/Customer_management_system/create.php',role="Button">New customer</a>
<br>
<table class="table">
<thead>
    <tr>
        <th>id</th>
        <th>name</th>
        <th>email</th>
        <th>phone</th>
        <th>address</th>
        <th>created_at</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "customer management system";
    //create connection with the database
$database = new $mysqli($servername, $username, $password, $database);
    // check connection with an if statement
    if($database->connect_error){
        die("Connection failed" . $database->connect_error);
    }
    //read all rows from the database
$sql = "SELECT * FROM customer";
    $result = $database->query($sql);
    if(!$result){  die("invalid query" . $database->error);
    }
     //read data for each row
while ($row = $result->fetch_assoc())
    echo"<tr>
    <td>$row[id]</td>
    <td>$row[name]</td>
    <td>$row[email]</td>
    <td>$row[phone]</td>
    <td>$row[address]</td>
    <td>$row[created_at]</td>
</table>
        </div>
    </body>
</html>