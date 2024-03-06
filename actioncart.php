<?php 
session_start();
if(!isset($_SESSION['islogin']))
{
    $_SESSION['msg'] = "Please Login First";
    header('location: login.php');
}
if(isset($_POST['cart']))
{
    $user_id = $_SESSION['userid'];
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $qrycheck = "SELECT * FROM carts WHERE user_id = $user_id AND product_id = $product_id";
    include 'includes/dbconnection.php';
    $resultcheck = mysqli_query($conn, $qrycheck);
    include 'includes/closeconnection.php';
    if(mysqli_num_rows($resultcheck) > 0)
    {
        $_SESSION['msg'] = "Product Already in Cart";
        header('location: viewproduct.php?id='.$product_id);
    }
    else
    {
        $qry = "INSERT INTO carts (user_id, product_id, quantity) VALUES ($user_id, $product_id, $quantity)";
        include 'includes/dbconnection.php';
        $result = mysqli_query($conn, $qry);
        include 'includes/closeconnection.php';
        if($result)
        {
            $_SESSION['msg'] = "Product Added to Cart";
            header('location: viewproduct.php?id='.$product_id);
        }
        else
        {
            $_SESSION['msg'] = "Failed to Add Product to Cart";
            header('location: viewproduct.php?id='.$product_id);
        }
    }

}