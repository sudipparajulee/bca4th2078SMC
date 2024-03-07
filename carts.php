<?php include 'includes/header.php';
if(!isset($_SESSION['islogin']))
{
    $_SESSION['msg'] = "Please Login First";
    header('location: login.php');
}
$user_id = $_SESSION['userid'];
$qrycart = "SELECT * FROM carts WHERE user_id = $user_id";
include 'includes/dbconnection.php';
$resultcart = mysqli_query($conn, $qrycart);
include 'includes/closeconnection.php';
?>
    <h1 class="text-center font-bold text-4xl my-10">My <span class="text-red-500"> Cart </span></h1>

    <div class="grid gap-10 px-24 grid-cols-2">
        <?php while($rowcart = mysqli_fetch_assoc($resultcart)){
        $qryprd = "SELECT * FROM products WHERE id=".$rowcart['product_id'];
        include 'includes/dbconnection.php';
        $resultprd = mysqli_query($conn, $qryprd);
        $rowprd = mysqli_fetch_assoc($resultprd);
        include 'includes/closeconnection.php';

            ?>
        <div class="bg-gray-100 p-4 rounded-lg shadow flex justify-between">
            <img src="uploads/<?php echo $rowprd['photopath'];?>" alt="" class="h-40 w-40 object-cover">
            <div>
                <h1 class="text-2xl font-bold"><?php echo $rowprd['name'];?></h1>
                <p class="text-lg">Price: Rs. <?php echo $rowprd['price'];?>/-</p>
                <p class="text-lg">Quantity: <?php echo $rowcart['quantity']; ?></p>
                <p class="text-lg">Total: Rs. <?php echo $rowprd['price'] * $rowcart['quantity'];?></p>
            </div>
            <div class="flex flex-col">
                <a href="actioncart.php?deleteid=<?php echo $rowcart['id'];?>" onclick="return confirm('Are you sure to remove from Cart?')" class="bg-red-500 text-white px-4 py-2 rounded-lg my-2">Remove</a>
                <form action="actionorder.php" method="POST">
                    <input type="hidden" name="cart_id" value="<?php echo $rowcart['id'];?>">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg my-2">Buy Now</button>
                </form>
            </div>
        </div>
        <?php } ?>
    </div>
<?php include 'includes/footer.php'; ?>