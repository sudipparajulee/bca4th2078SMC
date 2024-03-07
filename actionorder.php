<?php 
session_start();
if(!isset($_SESSION['islogin']))
{
    $_SESSION['msg'] = "Invalid Request";
    header('location: index.php');
}
if(isset($_POST['cart_id']))
{
    $cart_id = $_POST['cart_id'];
    $qrycart = "SELECT * FROM carts WHERE id=$cart_id";
    include 'includes/dbconnection.php';
    $resultcart = mysqli_query($conn, $qrycart);
    $rowcart = mysqli_fetch_assoc($resultcart);
    $qryprd = "SELECT * FROM products WHERE id=".$rowcart['product_id'];
    $resultprd = mysqli_query($conn,$qryprd);
    $rowprd = mysqli_fetch_assoc($resultprd);
    include 'includes/closeconnection.php';
    $user_id = $_SESSION['userid'];
    $product_id = $rowprd['id'];
    $order_date = date('Y-m-d');
    $price = $rowprd['price'];
    $quantity = $rowcart['quantity'];
    $status = "Pending";

    $qryorder = "INSERT INTO orders (user_id, product_id, order_date, price, quantity, status) VALUES ($user_id, $product_id, '$order_date', $price, $quantity, '$status')";
    include 'includes/dbconnection.php';
    $res = mysqli_query($conn, $qryorder);
    include 'includes/closeconnection.php';
    if($res)
    {
        $qrydel = "DELETE FROM carts WHERE id=$cart_id";
        $stock = $rowprd['stock'] - $quantity;
        $qrystock = "UPDATE products SET stock=$stock WHERE id=".$rowprd['id'];
        include 'includes/dbconnection.php';
        $resdel = mysqli_query($conn, $qrydel);
        $resstock = mysqli_query($conn, $qrystock);
        include 'includes/closeconnection.php';
        if($resdel && $resstock)
        {
            $_SESSION['msg'] = "Order Placed Successfully";
            header('location: index.php');
        }
        else
        {
            $_SESSION['msg'] = "Failed to Place Order";
            header('location: index.php');
        }
    }

}
?>