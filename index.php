<?php
include('conn.php');
session_start();
if(isset($_POST['submit'])){
    $mobile = $_POST['mobile'];
    $pass = $_POST['pass'];
    $role = $_POST['role'];
    if($role=="farmer"){
        $q = $db->prepare("SELECT * FROM farmer WHERE mobile='$mobile' && pass='$pass'");
        $q->execute();
        $res = $q->fetchAll(PDO::FETCH_OBJ);
        if($res){
            $_SESSION['mobile'] = $mobile;
            header("Location:farmer.php");
        }
        else{
            echo "<script>alert('Invalid Login Credentials')</script>";
        }
    }
    else if($role=="merchant"){
        $q = $db->prepare("SELECT * FROM merchant WHERE mobile='$mobile' && pass='$pass'");
        $q->execute();
        $res =  $q->fetchAll(PDO::FETCH_OBJ);
        if($res){
            $_SESSION['mobile'] = $mobile;
            header("Location:merchant.php");
        }
        else{
            echo "<script>alert('Invalid Login Credentials')</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Grazier Login</title>
</head>
<body>
    <div class="main">
        <header>
            <nav>
                <img src="./img/logo.jpg" alt="logo" width="125px">
            </nav>
        </header>
        <section>
            <div class="card">
                <h1>Login Here</h1>
                <form action="" method="post">
                    <label for="mobile">Enter Mobile Number</label>
                    <input type="text" id="mobile" name="mobile">
                    <label for="pass">Enter Password</label>
                    <input type="password" name="pass" id="pass">
                    <label for="role">Are You?</label>
                    <p class="radio"><input type="radio" name="role" value="farmer"> Farmer (Selling crop)</p>
                    <p class="radio"><input type="radio" name="role" value="merchant"> Merchant (Buying Crop)</p>
                    <button id="submit" name="submit">Submit</button>
                </form>
                <h3>Not Registered?</h3>
                <a href="./register.php">Register Here</a>
            </div>
        </section>
        <footer>&copy; Grazier</footer>
    </div>
</body>
</html>