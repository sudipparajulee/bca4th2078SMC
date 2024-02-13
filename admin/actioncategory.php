<?php
$name = $_POST['name'];
$priority = $_POST['priority'];

$qry = "INSERT INTO categories(name, priority) VALUES('$name', $priority)";

include '../includes/dbconnection.php';
$result = mysqli_query($conn, $qry);
if($result){
    echo "<script>
    alert('Category added successfully');
    window.location.href = 'categories.php';
    </script>";
}else{
    echo "Error adding category";
}
include '../includes/closeconnection.php';
?>