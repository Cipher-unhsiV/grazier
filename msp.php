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
                <p>Welcome User!</p>
                <h3>MSP of Crops for Crop Season</h3>
                <table>
                    <tr id="theading">
                        <td class="th_data">Crops</td>
                        <td class="th_data">MSP for RMS 2020-21(Rs/quintal)</td>
                        <td class="th_data">MSP for RMS 2021-22(Rs/quintal)</td>
                        <td class="th_data">Cost* of production 2021-22 (Rs/quintal)</td>
                    </tr>
                    <tr class="t_row">
                        <td class="tr_data">Wheat</td>
                        <td class="tr_data">1925</td>
                        <td class="tr_data">1975</td>
                        <td class="tr_data">960</td>
                    </tr>
                    <tr class="t_row">
                        <td class="tr_data">Barley</td>
                        <td class="tr_data">1525</td>
                        <td class="tr_data">1600</td>
                        <td class="tr_data">971</td>
                    </tr>
                    <tr class="t_row">
                        <td class="tr_data">Gram</td>
                        <td class="tr_data">4875</td>
                        <td class="tr_data">5100</td>
                        <td class="tr_data">2866</td>
                    </tr>
                    <tr class="t_row">
                        <td class="tr_data">Lentil(Masur)</td>
                        <td class="tr_data">4800</td>
                        <td class="tr_data">5100</td>
                        <td class="tr_data">2864</td>
                    </tr>
                    <tr class="t_row">
                        <td class="tr_data">RapeSeed & Mustard</td>
                        <td class="tr_data">4425</td>
                        <td class="tr_data">4650</td>
                        <td class="tr_data">2415</td>
                    </tr>
                    <tr class="t_row">
                        <td class="tr_data">Sunflower</td>
                        <td class="tr_data">2515</td>
                        <td class="tr_data">5327</td>
                        <td class="tr_data">3551</td>
                    </tr>
                </table>
            </div>
        </section>
        <footer>&copy; Grazier</footer>
    </div>
</body>
</html>