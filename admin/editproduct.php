<?php include 'header.php';
include '../includes/dbconnection.php';
$qry = "SELECT * FROM categories ORDER BY priority";
$pid = $_GET['id'];
$pqry = "SELECT * FROM products WHERE id = $pid";
$presult = mysqli_query($conn, $pqry);
$product = mysqli_fetch_assoc($presult);
$result = mysqli_query($conn, $qry);
include '../includes/closeconnection.php';
?>

    <h1 class="text-3xl font-bold">Edit Product</h1>
    <hr class="my-3 h-1 bg-orange-500">

    <form action="actionproduct.php" method="POST" enctype="multipart/form-data">

    <select name="category_id" id="" class="p-2 bg-gray-100 border rounded w-full block my-3">
        <?php while($row = mysqli_fetch_assoc($result)){ ?>
        <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
        <?php } ?>
        
    </select>

    <input type="text" name="name" value="<?php echo $product['name'];?>" placeholder="Enter Product Name" class="p-2 bg-gray-100 border rounded w-full block my-3">
    
    <input type="text" name="description" placeholder="Enter Description" class="p-2 bg-gray-100 border rounded w-full block my-3">

    <input type="text" name="price" placeholder="Enter Price" class="p-2 bg-gray-100 border rounded w-full block my-3">

    <input type="text" name="stock" placeholder="Enter stock" class="p-2 bg-gray-100 border rounded w-full block my-3">

    <select name="status" id="" class="p-2 bg-gray-100 border rounded w-full block my-3">
        <option value="Show">Show</option>
        <option value="Hide">Hide</option>
    </select>

    <input type="file" name="photopath" class="p-2 bg-gray-100 border rounded w-full block my-3">

    <div class="flex justify-center gap-5 mt-5">
        <input type="submit" name="store" value="Add Product" class="bg-blue-500 text-white px-4 py-2 rounded cursor-pointer">
        <a href="products.php" class="bg-red-500 text-white px-8 py-2 rounded">Exit</a>
    </div>

    </form>

<?php include 'footer.php'; ?>