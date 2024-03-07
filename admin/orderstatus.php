<?php
session_start();
if(!isset($_SESSION['islogin']))
{
    $_SESSION['msg'] = "Invalid Request";
    header('location: index.php');
}

if(isset($_GET['orderid']))
{
    $orderid = $_GET['orderid'];
    $status = $_GET['status'];
    $qry = "UPDATE orders SET status='$status' WHERE id=$orderid";
    include '../includes/dbconnection.php';
    $res = mysqli_query($conn, $qry);
    include '../includes/closeconnection.php';
    if($res)
    {
        $_SESSION['msg'] = "Status Updated Successfully";
        header('location: orders.php');
    }
    else
    {
        $_SESSION['msg'] = "Failed to Update Status";
        header('location: orders.php');
    }
}
?>