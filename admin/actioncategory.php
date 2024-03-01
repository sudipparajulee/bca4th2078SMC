<?php
session_start();
if(isset($_POST['store']))
{
    $name = $_POST['name'];
    $priority = $_POST['priority'];

    $qry = "INSERT INTO categories(name, priority) VALUES('$name', $priority)";

    include '../includes/dbconnection.php';
    $result = mysqli_query($conn, $qry);
    if($result){
        $_SESSION['msg'] = "Category created successfully";
        header('location: categories.php');
    }else{
        echo "Error adding category";
    }
    include '../includes/closeconnection.php';
}

//update
if(isset($_POST['update']))
{
    $id = $_POST['categoryid'];
    $name = $_POST['name'];
    $priority = $_POST['priority'];

    $qry = "UPDATE categories SET name = '$name', priority = $priority WHERE id = $id";

    include '../includes/dbconnection.php';
    $result = mysqli_query($conn, $qry);
    include '../includes/closeconnection.php';

    if($result){
        $_SESSION['msg'] = "Category updated successfully";
        header('location: categories.php');
    }else{
        echo "Error updating category";
    }
}

//delete
if(isset($_GET['deleteid']))
{
    $id = $_GET['deleteid'];
    $qry = "DELETE FROM categories WHERE id = $id";

    include '../includes/dbconnection.php';
    $result = mysqli_query($conn, $qry);
    include '../includes/closeconnection.php';

    if($result){
        $_SESSION['msg'] = "Category deleted successfully";
        header('location: categories.php');
    }else{
        echo "Error deleting category";
    }
}
?>