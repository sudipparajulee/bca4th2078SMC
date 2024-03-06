<?php include 'includes/header.php';?>
    <!-- Register  -->

    <div class="flex justify-center items-center my-10">
        <form action="" method="POST" class="bg-gray-100 w-8/12 p-10 rounded shadow">
            <h1 class="text-center font-bold text-4xl my-10">Register</h1>
            <input type="text" class="w-full p-2 my-5 border-2 border-gray-300" name="fullname" placeholder="Full Name">
            <input type="email" class="w-full p-2 my-5 border-2 border-gray-300" name="email" placeholder="Email">
            <input type="text" class="w-full p-2 my-5 border-2 border-gray-300" name="phone" placeholder="Phone">
            <input type="text" class="w-full p-2 my-5 border-2 border-gray-300" name="address" placeholder="Address">
            <input type="password" class="w-full p-2 my-5 border-2 border-gray-300" name="password" placeholder="Password">
            <input type="password" class="w-full p-2 my-5 border-2 border-gray-300" name="cpassword" placeholder="Confirm Password">
            <button type="submit" name="register" class="w-full p-2 my-5 bg-orange-500 text-white font-bold">Register</button>
            <div class="my-5">
                <p class="text-center">Already have an account? <a href="login.php" class="text-blue-500">Login Now</a></p>
            </div>
        </form>
    </div>

<?php include 'includes/footer.php';?>

<?php
if(isset($_POST['register'])){
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if($password == $cpassword){
        $password = md5($password);
        $qry = "INSERT INTO users (fullname, email, password,phone,address) VALUES ('$fullname', '$email', '$password', '$phone', '$address')";
        include 'includes/dbconnection.php';
        $result = mysqli_query($conn, $qry);
        include 'includes/closeconnection.php';
        if($result){
            echo "<script>alert('User Registered Successfully');
            window.location.href = 'login.php';
            </script>";
        }else{
            echo "<script>alert('User Registration Failed')</script>";
        }
    }else{
        echo "<script>alert('Password and Confirm Password do not match')</script>";
    }
}
?>