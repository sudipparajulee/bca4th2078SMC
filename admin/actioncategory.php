<?php
$name = $_POST['name'];
$priority = $_POST['priority'];

$qry = "INSERT INTO categories(name, priority) VALUES('$name', $priority)";

//create connection
$server = "localhost";
$username = "root";
$password = "";
$db = "bcaecommerce";

$conn = mysqli_connect($server, $username, $password, $db);

//check connection
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
else{
    echo "Connected successfully";
}

?>