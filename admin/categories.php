<?php include 'header.php';
$qry = "SELECT * FROM categories ORDER BY priority";
include '../includes/dbconnection.php';
$result = mysqli_query($conn, $qry);
include '../includes/closeconnection.php';

?>

    <h1 class="text-3xl font-bold">Categories</h1>
    <hr class="my-3 h-1 bg-orange-500">

    <!-- Add Category Button  -->
    <div class="text-right my-5">
        <a href="createcategory.php" class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600">Add Category</a>
    </div>

    <table class="w-full">
        <tr class="bg-gray-200">
            <th class="border p-2">Order</th>
            <th class="border p-2">Category Name</th>
            <th class="border p-2">Action</th>
        </tr>
        <?php
        while($row = mysqli_fetch_assoc($result)){
        ?>
        <tr class="text-center">
            <td class="border p-2"><?php echo $row['priority']; ?></td>
            <td class="border p-2"><?php echo $row['name']; ?></td>
            <td class="border p-2">
                <a href="editcategory.php?id=<?php echo $row['id']; ?>" class="bg-blue-600 text-white px-4 mx-1 py-1 rounded">Edit</a>
                <a href="" class="bg-red-600 text-white px-4 mx-1 py-1 rounded">Delete</a>
            </td>
        </tr>
        <?php
        }
        ?>
        
        
    </table>

<?php include 'footer.php'; ?>