<?php
session_start();
$qrycat = "SELECT * FROM categories ORDER BY priority";
include 'includes/dbconnection.php';
$resultcat = mysqli_query($conn, $qrycat);
include 'includes/closeconnection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
</head>
<body>
<?php if(isset($_SESSION['msg'])){ ?>
    <div id="msg" class="fixed right-4 top-4 bg-blue-600 text-white px-10 py-4 rounded-xl text-xl font-bold z-50">
        <p><?php echo $_SESSION['msg']; ?></p>
    </div>
    <script>
        setTimeout(function(){
            document.getElementById('msg').style.display = 'none';
        }, 2000);
    </script>
    <?php 
    unset($_SESSION['msg']);
    } ?>

    <nav class="flex bg-orange-500 px-20 items-center justify-between">
        <img src="https://icms-image.slatic.net/images/ims-web/e6ac6883-1158-4663-bda4-df5a1aa066e5.png" alt="">
        <div>
            <a href="index.php" class="text-lg font-bold text-white px-5">Home</a>
            <?php
            while($rowcat = mysqli_fetch_assoc($resultcat)){ 
            ?>
            <a href="categoryproduct.php?category=<?php echo $rowcat['id'];?>" class="text-lg font-bold text-white px-5"><?php echo $rowcat['name']; ?></a>
            <?php } ?>
            <?php if(isset($_SESSION['islogin'])) { ?>
            <div class="text-lg font-bold text-white p-5 relative group inline cursor-pointer"><i class="ri-user-fill"></i>
                <div class="absolute top-10 right-0 hidden group-hover:block border rounded-lg bg-gray-100 text-gray-800 w-40 text-sm">
                    <a href="" class="p-2 block rounded hover:bg-gray-200"><i class="ri-user-fill"></i> My Profile</a>
                    <hr>
                    <a href="" class="p-2 block rounded hover:bg-gray-200">
                        <p><i class="ri-shopping-cart-2-line"></i> My Cart</p>
                    </a>
                    <hr>
                    <a href="admin/logout.php" class="p-2 block rounded hover:bg-gray-200"><i class="ri-logout-box-line"></i>&nbsp;Logout</a>
                </div>
            </div>
            <?php } else { ?>
            <a href="login.php" class="text-lg font-bold text-white px-5">Login</a>
            <?php } ?>
        </div>
    </nav>