<?php include 'header.php'; 
$qry = "SELECT * FROM users WHERE role='user'";
include '../includes/dbconnection.php';
$result = mysqli_query($conn, $qry);
include '../includes/closeconnection.php';
?>
    <h1 class="text-3xl font-bold">Customers</h1>
    <hr class="my-3 h-1 bg-orange-500">

    <table class="w-full">
        <tr class="bg-gray-200">
            <th class="p-2 border">Name</th>
            <th class="p-2 border">Email</th>
            <th class="p-2 border">Phone</th>
            <th class="p-2 border">Address</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)){ ?>
        <tr class="text-center">
            <td class="p-2 border"><?php echo $row['fullname']; ?></td>
            <td class="p-2 border"><?php echo $row['email']; ?></td>
            <td class="p-2 border"><?php echo $row['phone'] ?></td>
            <td class="p-2 border"><?php echo $row['address']; ?></td>
        </tr>
        <?php } ?>
    </table>
<?php include 'footer.php'; ?>