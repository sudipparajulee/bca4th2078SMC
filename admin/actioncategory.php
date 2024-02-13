<?php
$name = $_POST['name'];
$priority = $_POST['priority'];

$qry = "INSERT INTO categories(name, priority) VALUES('$name', $priority)";

include '../includes/dbconnection.php';
$result = mysqli_query($conn, $qry);
if($result){
    echo "Category added successfully";
}else{
    echo "Error adding category";
}
include '../includes/closeconnection.php';
?>