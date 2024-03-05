<?php include 'includes/header.php'; 
$qry = "SELECT * FROM products ORDER BY product_date DESC LIMIT 4";
$qryall = "SELECT * FROM products ORDER BY RAND()";
include 'includes/dbconnection.php';
$result = mysqli_query($conn, $qry);
$resultall = mysqli_query($conn, $qryall);
include 'includes/closeconnection.php';
?>
    <h1 class="text-center font-bold text-4xl my-10">Recent <span class="text-red-500"> Products </span></h1>

    <div class="grid grid-cols-4 gap-10 px-20">
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <a href="viewproduct.php?id=<?php echo $row['id'];?>" class="hover:-translate-y-2 duration-300 hover:shadow-lg">
            <div class="bg-gray-100 rounded shadow">
                <img src="uploads/<?php echo $row['photopath']; ?>" class="w-full h-60 object-cover rounded">
                <div class="p-2">
                    <h2 class="text-lg font-bold"><?php echo $row['name']; ?></h2>
                    <p class="text-sm text-gray-600">Rs.<?php echo $row['price']; ?></p>
                </div>
            </div>
        </a>
        <?php } ?>
    </div>


    <h1 class="text-center font-bold text-4xl my-10">All <span class="text-red-500"> Products </span></h1>

    <div class="grid grid-cols-6 gap-10 px-20">
        <?php while($row = mysqli_fetch_assoc($resultall)) { ?>
        <a href="viewproduct.php?id=<?php echo $row['id'];?>" class="hover:-translate-y-2 duration-300 hover:shadow-lg">
            <div class="bg-gray-100 rounded shadow">
                <img src="uploads/<?php echo $row['photopath']; ?>" class="w-full h-52 object-cover rounded">
                <div class="p-2">
                    <h2 class="text-lg font-bold"><?php echo $row['name']; ?></h2>
                    <p class="text-sm text-gray-600">Rs.<?php echo $row['price']; ?></p>
                </div>
            </div>
        </a>
        <?php } ?>
    </div>
<?php include 'includes/footer.php'; ?>