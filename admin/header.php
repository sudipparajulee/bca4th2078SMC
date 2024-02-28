<?php session_start(); 
if(!isset($_SESSION['islogin']))
{
    header('location: ../login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="flex">
        <nav class="h-screen bg-gray-200 shadow w-56">
        <img class="bg-orange-500 p-4" src="https://icms-image.slatic.net/images/ims-web/e6ac6883-1158-4663-bda4-df5a1aa066e5.png" alt="">
        <div class="mt-5 pl-4 text-lg font-bold">
            <p class="text-center font-bold">Hello, <?php echo $_SESSION['username']; ?></p>
            <a href="dashboard.php" class="block p-4 hover:bg-gray-300 my-2">Dashboard</a>
            <a href="categories.php" class="block p-4 hover:bg-gray-300 my-2">Categories</a>
            <a href="products.php" class="block p-4 hover:bg-gray-300 my-2">Products</a>
            <a href="" class="block p-4 hover:bg-gray-300 my-2">Customers</a>
            <a href="" class="block p-4 hover:bg-gray-300 my-2">Orders</a>
            <a href="logout.php" class="block p-4 hover:bg-gray-300 my-2">Logout</a>
        </div>
        </nav>
        <!-- For Content Part  -->
        <div class="p-4 flex-1">