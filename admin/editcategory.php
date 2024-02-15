<?php include 'header.php';
$id = $_GET['id'];
$qry = "SELECT * FROM categories WHERE id = $id";
include '../includes/dbconnection.php';
$result = mysqli_query($conn, $qry);
include '../includes/closeconnection.php';
$row = mysqli_fetch_assoc($result);
?>

    <h1 class="text-3xl font-bold">Edit Category</h1>
    <hr class="my-3 h-1 bg-orange-500">

    <form action="actioncategory.php" method="POST">
        <input type="hidden" name="categoryid" value="<?php echo $row['id'];?>">
        <input type="text" name="priority" value="<?php echo $row['priority']; ?>" placeholder="Enter Priority" class="p-2 bg-gray-100 border rounded w-full block my-3">
        <input type="text" name="name" value="<?php echo $row['name']; ?>" placeholder="Enter Category Name" class="p-2 bg-gray-100 border rounded w-full block my-3">
        
        <div class="my-5 flex justify-center gap-5">
            <input type="submit" name="update" value="Update Category" class="bg-blue-500 text-white px-4 py-2 rounded cursor-pointer">
            <a href="" class="bg-red-500 text-white px-8 py-2 rounded">Exit</a>
        </div>
    </form>

<?php include 'footer.php'; ?>