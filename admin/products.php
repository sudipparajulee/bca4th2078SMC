<?php include 'header.php'; 
$qry = "SELECT * FROM products";
include '../includes/dbconnection.php';
$result = mysqli_query($conn, $qry);
include '../includes/closeconnection.php';
?>

    <h1 class="text-3xl font-bold">Products</h1>
    <hr class="my-3 h-1 bg-orange-500">

    <!-- Add Product Button  -->
    <div class="text-right my-5">
        <a href="createproduct.php" class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600">Add Product</a>
    </div>


    <table class="w-full">
        <tr class="bg-gray-200">
            <th class="border p-2">Product Date</th>
            <th class="border p-2">Name</th>
            <th class="border p-2">Description</th>
            <th class="border p-2">Price</th>
            <th class="border p-2">Stock</th>
            <th class="border p-2">Category</th>
            <th class="border p-2">Photo</th>
            <th class="border p-2">Action</th>
        </tr>
        <?php
        while($row = mysqli_fetch_assoc($result)){
            $qrycat = "SELECT name FROM categories WHERE id = ".$row['category_id'];
            include '../includes/dbconnection.php';
            $resultcat = mysqli_query($conn, $qrycat);
            $rowcat = mysqli_fetch_assoc($resultcat);
            include '../includes/closeconnection.php';
        ?>
        <tr class="text-center">
            <td class="border p-2"><?php echo $row['product_date']; ?></td>
            <td class="border p-2"><?php echo $row['name']; ?></td>
            <td class="border p-2"><?php echo $row['description']; ?></td>
            <td class="border p-2"><?php echo $row['price']; ?></td>
            <td class="border p-2"><?php echo $row['stock']; ?></td>
            <td class="border p-2"><?php echo $rowcat['name']; ?></td>
            <td class="border p-2">
                <img class="h-24" src="../uploads/<?php echo $row['photopath']; ?>" alt="">
            </td>
            <td class="border p-2">
                <a href="editproduct.php?id=<?php echo $row['id']; ?>" class="bg-blue-600 text-white px-4 mx-1 py-1 rounded">Edit</a>
                <a href="actionproduct.php?deleteid=<?php echo $row['id'];?>" class="bg-red-600 text-white px-4 mx-1 py-1 rounded" onclick="return confirm('Are you sure to Delete?');">Delete</a>
            </td>
        </tr>
        <?php
        }
        ?>
        
        
    </table>

<?php include 'footer.php'; ?>