<?php include 'header.php'; 
$qry = "SELECT orders.id,order_date,products.name,products.price,orders.quantity,fullname,address,phone,orders.status FROM orders INNER JOIN products ON orders.product_id=products.id INNER JOIN users ON orders.user_id=users.id";
include '../includes/dbconnection.php';
$result = mysqli_query($conn, $qry);
include '../includes/closeconnection.php';
?>
    <h1 class="text-3xl font-bold">Orders</h1>
    <hr class="my-3 h-1 bg-orange-500">

    <table class="w-full">
        <tr class="bg-gray-200">
            <th class="p-2 border">Order ID</th>
            <th class="p-2 border">Order Date</th>
            <th class="p-2 border">Product</th>
            <th class="p-2 border">Price</th>
            <th class="p-2 border">Quantity</th>
            <th class="p-2 border">Total</th>
            <th class="p-2 border">Customer Name</th>
            <th class="p-2 border">Address</th>
            <th class="p-2 border">Phone</th>
            <th class="p-2 border">Status</th>
            <th class="p-2 border">Action</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)){ ?>
            <tr>
                <td class="p-2 border text-center"><?php echo $row['id']; ?></td>
                <td class="p-2 border text-center"><?php echo $row['order_date']; ?></td>
                <td class="p-2 border text-center"><?php echo $row['name']; ?></td>
                <td class="p-2 border text-center"><?php echo $row['price']; ?></td>
                <td class="p-2 border text-center"><?php echo $row['quantity']; ?></td>
                <td class="p-2 border text-center"><?php echo $row['price']*$row['quantity']; ?></td>
                <td class="p-2 border text-center"><?php echo $row['fullname']; ?></td>
                <td class="p-2 border text-center"><?php echo $row['address']; ?></td>
                <td class="p-2 border text-center"><?php echo $row['phone']; ?></td>
                <td class="p-2 border text-center"><?php echo $row['status']; ?></td>
                <td class="p-2 border text-center"> 
                    <a href="orderstatus.php?status=Pending&orderid=<?php echo $row['id'];?>" class="bg-blue-500 text-white px-2 py-1" onclick="return confirm('Are you Sure to Change Status to Pending')">Pending</a>

                    <a href="orderstatus.php?status=Processing&orderid=<?php echo $row['id'];?>" class="bg-green-500 text-white px-2 py-1" onclick="return confirm('Are you Sure to Change Status to Processing')">Processing</a>

                    <a href="orderstatus.php?status=Completed&orderid=<?php echo $row['id'];?>" class="bg-red-500 text-white px-2 py-1" onclick="return confirm('Are you Sure to Change Status to Completed')">Completed</a>


                </td>
            </tr>
        <?php } ?>
    </table>
<?php include 'footer.php'; ?>