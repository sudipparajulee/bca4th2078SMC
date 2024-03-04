<?php
session_start();
if(isset($_POST['store']))
{
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $status = $_POST['status'];
    $product_date = date('Y-m-d');
    $photopath = $_FILES['photopath']['name'];
    $tmp_name = $_FILES['photopath']['tmp_name'];
    $photopath = time().$photopath;
    $filepath = "../uploads/".$photopath;
    move_uploaded_file($tmp_name, $filepath);
    
    include '../includes/dbconnection.php';
    $qry = "INSERT INTO products (category_id, name, description, price, stock, status, photopath,product_date) VALUES ($category_id, '$name', '$description', $price, $stock, '$status', '$photopath','$product_date')";
    $res = mysqli_query($conn, $qry);
    include '../includes/closeconnection.php';
    if($res)
    {
        $_SESSION['msg'] = "Product Created Successfully";
        header('location: products.php');
    }
    else
    {
        echo "Error";
    }
}

//for update
if(isset($_POST['update']))
{
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $status = $_POST['status'];
    $oldpath = $_POST['oldpath'];
    $id = $_POST['id'];
    if($_FILES['photopath']['name'] != "")
    {
        $photopath = $_FILES['photopath']['name'];
        $tmp_name = $_FILES['photopath']['tmp_name'];
        $photopath = time().$photopath;
        $filepath = "../uploads/".$photopath;
        move_uploaded_file($tmp_name, $filepath);
        unlink("../uploads/".$oldpath);
    }
    else
    {
        $photopath = $oldpath;
    }

    $qry = "UPDATE products SET category_id = $category_id, name = '$name', description = '$description', price = $price, stock = $stock, status = '$status', photopath = '$photopath' WHERE id = $id";

    include '../includes/dbconnection.php';
    $res = mysqli_query($conn, $qry);
    include '../includes/closeconnection.php';
    if($res)
    {
        $_SESSION['msg'] = "Product Updated Successfully";
        header('location: products.php');
    }
    else
    {
        echo "Error";
    }

}

//for delete
if(isset($_GET['deleteid']))
{
    $id = $_GET['deleteid'];
    $qry = "SELECT photopath FROM products WHERE id = $id";
    include '../includes/dbconnection.php';
    $res = mysqli_query($conn, $qry);
    $row = mysqli_fetch_assoc($res);
    unlink("../uploads/".$row['photopath']);
    $qry = "DELETE FROM products WHERE id = $id";
    $res = mysqli_query($conn, $qry);
    include '../includes/closeconnection.php';
    if($res)
    {
        $_SESSION['msg'] = "Product Deleted Successfully";
        header('location: products.php');
    }
    else
    {
        echo "Error";
    }
}