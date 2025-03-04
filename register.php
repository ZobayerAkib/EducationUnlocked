<?php
include 'connect.php';
include 'nav.php';
?>
<?php
if(isset($_SESSION['user_id']))
{
	header("Location:profile.php");
}
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    date_default_timezone_set("Asia/Dhaka");
    $time = date("d/m/y")." ".date("h:i:sa");
    $age = $_POST['age'];
    $school = $_POST['school'];
    if (!empty($_POST['gen'])) {
    $gender = $_POST['gen'];
    $sql = "select *from user where email='$email'";
    $result = mysqli_query($conn, $sql);
    if (!$result->num_rows > 0) {
        $sql = "insert into user (username,email,password,created_at,age,school,gender) values('$username','$email','$password','$time','$age','$school','$gender')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script>alert('Register completed. Please Log in')</script>";
        } else {
            echo "<script>alert('something wrong')</script";
        }
    } else {
        echo "<script>alert('Email already exist. Please login with your email id and password');location.href='login.php';</script";
    }
    }else{
        echo "<script>alert('select gender')</script>";
    }
    
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/reg.css">


    <title>Register</title>
</head>

<body style="background-image: url(images/bg1.jpg);">
    <!-- Register Section -->
    <div class="container" style="width: 450px;text-align: center;margin-top:120px;margin-bottom:120px;height:670px;background-color:white;box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);border-radius:5px;">
        <!-- Register Card Section -->
        <div class="card">
            <form action="" method="POST" class="">
                <p class="login-text" style="font-size: 2rem; font-weight: 800;margin-top:20px;margin-bottom:55px;">Register</p>
                <div class="input-group" style="margin-bottom: 40px;">
                    <label style="margin-right: 76px;margin-left:20px;font-size:20px;font-weight:bold;">Username</label>
                    <input style="border-radius: 5px;font-size:15px;font-weight:bold;" type="text" placeholder="Username" name="username" value="" required>
                </div>
                <div class="input-group" style="margin-bottom: 40px;">
                    <label style="margin-right: 125px;margin-left:20px;font-size:20px;font-weight:bold;">Email</label>
                    <input style="border-radius: 5px;font-size:15px;font-weight:bold;" type="email" placeholder="Email" name="email" value="" required>
                </div>
                
                <div class="input-group" style="margin-bottom: 40px;">
                    <label style="margin-right: 81px;margin-left:20px;font-size:20px;font-weight:bold;">Password</label>
                    <input style="border-radius: 5px;font-size:15px;font-weight:bold;" type="password" placeholder="Password" name="password" value="" required>
                </div>
                <div class="input-group" style="margin-bottom: 40px;">
                    <label style="margin-right: 144px;margin-left:20px;font-size:20px;font-weight:bold;">Age</label>
                    <input style="border-radius: 5px;font-size:15px;font-weight:bold;" type="number" placeholder="Age" name="age" value="" required>
                </div>
                <div class="input-group" style="margin-bottom: 40px;">
                    <label style="margin-right: 37px;margin-left:20px;font-size:20px;font-weight:bold;">School Name:</label>
                    <input style="border-radius: 5px;font-size:15px;font-weight:bold;" type="text" placeholder="School name" name="school" value="" required>
                </div>
                <div class="input-group" style="margin-bottom: 40px;">
                <label for="gender"> <label style="margin-right: 108px;margin-left:20px;font-size:20px;font-weight:bold;">Gender</label></label>
                    <select name="gen">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    
                    </select>
                </div>
                
                <div class="input-group d-flex justify-content-center" style="margin-top: 55px;">
                    <button name="submit" class="btn btn-success btn-lg" style="width: 400px;">Register</button>
                </div>
                <div class="login" style="margin-top: 20px;font-size:large;font-weight:bold;">
                    <label>Already have an account?</label>
                    <a class="" href="login.php">log in</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>
