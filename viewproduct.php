<?php include 'includes/header.php'; 
$id = $_GET['id'];
$qry = "SELECT * FROM products WHERE id = $id";
include 'includes/dbconnection.php';
$result = mysqli_query($conn, $qry);
$row = mysqli_fetch_assoc($result);
include 'includes/closeconnection.php';
?>
    <div class="mx-20 py-16 grid grid-cols-2 gap-10">
        <div>
            <img src="uploads/<?php echo $row['photopath']; ?>" class="w-full h-full object-cover rounded">
        </div>
        <div>
            <form action="">
                <h1 class="text-4xl font-bold"><?php echo $row['name']; ?></h1>
                <p class="text-gray-600 text-lg my-5">Rs. <?php echo $row['price']; ?>/-</p>
                <p class="text-gray-600 text-lg my-5">Stock: <?php echo $row['stock']; ?></p>
                <input class="border p-2" type="number" min="1" max="<?php echo $row['stock'];?>" value="1" required> <br><br>
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Buy Now</button>
            </form>
        </div>

        <div class="col-span-2">
            <h1 class="text-2xl font-bold my-5">Description</h1>
            <p class="text-gray-600"><?php echo $row['description']; ?></p>
        </div>
    </div>
<?php include 'includes/footer.php'; ?>