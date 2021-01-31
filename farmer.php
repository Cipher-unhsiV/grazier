<?php
include('conn.php');
session_start();
$mobile = $_SESSION['mobile'];
if(!$mobile){
	header('Location:index.php');
}
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
                <a href="logout.php" class="logout">Logout</a>
            </nav>
        </header>
        <section>
            <div class="card">
                <!--<h3>Login Here</h3>
                <form action="" method="post">
                    <label for="mobile">Enter Mobile Number</label>
                    <input type="text" id="mobile" name="mobile">
                    <label for="pass">Enter Password</label>
                    <input type="password" name="pass" id="pass">
                    <label for="role">Are You?</label>
                    <p><input type="radio" name="role" id="role" value="farmer"> Farmer (Selling crop)</p>
                    <p><input type="radio" name="role" id="role" value="merchant"> Merchant (Buying Crop)</p>
                    <button id="submit" name="submit">Submit</button>
                </form>
                <h3>Not Registered?</h3>
                <a href="./register.php">Register Here</a>-->
                <h2>Farmer Dashboard</h2>
                <p class="welcome">Welcome User!</p>
                <h3>Facilities</h3>
                <ul>
                    <li><a href="farmer_sell.php">Sell Crop</a></li>
                    <li><a href="msp.php">Check MSP</li>
                    <li><a href="fcrop_data.php">Crop Data Submitted</li>
                    <li><a href="f_willing.php">Merchant Willing to Buy</li>
                </ul>
                <h3>Important links</h3>
                <ul>
                    <li><a href="https://www.india.gov.in/website-ministry-agriculture-farmers-welfare">Website of Ministry of Agriculture & Farmers Welfare</a></li>
                    <li><a href="https://www.india.gov.in/departments-agriculture-states-and-union-territories">Departments of Agriculture of states and Union Territories</a></li>
                    <li><a href="https://www.india.gov.in/website-department-animal-husbandry-dairying-and-fisheries-0">Website of Department of Animal Husbandry Dairying and Fisheries</a></li>
                    <li><a href="https://www.india.gov.in/website-directorate-cashewnut-cocoa-development">Website of Directorate of Cashewnut & Cocoa Development</a></li>
                    <li><a href="https://www.india.gov.in/farmers-portal-india-department-agriculture-and-cooperation">Farmers' Portal of India by Department of Agriculture and Cooperation</a></li>
                </ul>
            </div>
        </section>
        <footer>&copy; Grazier</footer>
    </div>
</body>
</html>