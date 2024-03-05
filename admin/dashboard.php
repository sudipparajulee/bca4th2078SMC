<?php include 'header.php'; 
$qrycat = "SELECT count(id) as totalcategories FROM categories";
$qryproduct = "SELECT count(id) as totalproducts FROM products";
include '../includes/dbconnection.php';
$resultcat = mysqli_query($conn, $qrycat);
$resultproduct = mysqli_query($conn, $qryproduct);
$rowcat = mysqli_fetch_assoc($resultcat);
$rowproduct = mysqli_fetch_assoc($resultproduct);
include '../includes/closeconnection.php';
?>
            <h1 class="text-3xl font-bold">Dashboard</h1>
            <hr class="my-3 h-1 bg-orange-500">
            <div class="grid grid-cols-3 gap-10">
                <div class="bg-red-500 text-white p-5 shadow rounded">
                    <h1 class="text-2xl font-bold">Total Categories</h1>
                    <h1 class="text-4xl font-bold"><?php echo $rowcat['totalcategories']; ?></h1>
                </div>
                <div class="bg-blue-500 text-white p-5 shadow rounded">
                    <h1 class="text-2xl font-bold">Total Products</h1>
                    <h1 class="text-4xl font-bold"><?php echo $rowproduct['totalproducts'] ?></h1>
                </div>
                <div class="bg-green-500 text-white p-5 shadow rounded">
                    <h1 class="text-2xl font-bold">Total Orders</h1>
                    <h1 class="text-4xl font-bold">5</h1>
                </div>
            </div>
<?php include 'footer.php'; ?>