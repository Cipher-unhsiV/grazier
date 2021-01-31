<?php
include('conn.php');
session_start();
/*$mobile = $_SESSION['mobile'];
if(!$mobile){
	header('Location:index.php');
}*/

if(isset($_POST['submit'])){
    $mobile = $_POST['mobile'];
    $pass = $_POST['pass'];
    $address = strtolower($_POST['address']);
	$city = strtolower($_POST['city']);
    $age = $_POST['age'];
    $name = strtolower($_POST['name']);
    $gender = $_POST['gender'];
    $state = $_POST['state'];
    $role = $_POST['role'];
    if($role=="farmer"){
        $q = $db->prepare("INSERT INTO farmer (name, age, gender, address, city, state, role, mobile, pass) VALUES (:name,:age,:gender,:address,:city,:state,:role,:mobile,:pass)");
        $q->bindValue('name',$name);
        $q->bindValue('age',$age);
        $q->bindValue('gender',$gender);
        $q->bindValue('address',$address);
        $q->bindValue('city',$city);
        $q->bindValue('state',$state);
        $q->bindValue('role',$role);
        $q->bindValue('mobile',$mobile);
        $q->bindValue('pass',$pass);
        if($q->execute()){
            echo "<script>alert('Donor Registration Successful.')</script>";
            header('Location:index.php');
        }
        else{
            echo "<script>alert('Donor Registration Failed.')</script>";
            header('Location:index.php');
        }
    }
    else if($role=="merchant"){
        $q = $db->prepare("INSERT INTO merchant (name, age, gender, address, city, state, role, mobile, pass) VALUES (:name,:age,:gender,:address,:city,:state,:role,:mobile,:pass)");
        $q->bindValue('name',$name);
        $q->bindValue('age',$age);
        $q->bindValue('gender',$gender);
        $q->bindValue('address',$address);
        $q->bindValue('city',$city);
        $q->bindValue('state',$state);
        $q->bindValue('role',$role);
        $q->bindValue('mobile',$mobile);
        $q->bindValue('pass',$pass);
        if($q->execute()){
            echo "<script>alert('Donor Registration Successful.')</script>";
        }
        else{
            echo "<script>alert('Donor Registration Failed.')</script>";
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
                <h1>Register to Portal</h1>
                <form action="" method="POST">
                    <label for="name">Enter Name</label>
                    <input type="text" id="name" name="name">
                    <label for="age">Enter Age</label>
                    <input type="text" id="age" name="age">
                    <label for="gender">Select Gender</label>
                    <p><input type="radio" name="gender" value="male"> Male</p>
                    <p><input type="radio" name="gender" value="female"> Female</p>
                    <p><input type="radio" name="gender" value="other"> Other</p>
                    <label for="address">Enter Address</label>
                    <textarea name="address" id="address" cols="30" rows="10"></textarea>
                    <label for="city">Enter City</label>
                    <input type="text" id="city" name="city">
                    <label for="state">Enter State</label>
                    <select name="state" id="state" class="form-control">
                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                        <option value="Assam">Assam</option>
                        <option value="Bihar">Bihar</option>
                        <option value="Chandigarh">Chandigarh</option>
                        <option value="Chhattisgarh">Chhattisgarh</option>
                        <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                        <option value="Daman and Diu">Daman and Diu</option>
                        <option value="Delhi">Delhi</option>
                        <option value="Lakshadweep">Lakshadweep</option>
                        <option value="Puducherry">Puducherry</option>
                        <option value="Goa">Goa</option>
                        <option value="Gujarat">Gujarat</option>
                        <option value="Haryana">Haryana</option>
                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                        <option value="Jharkhand">Jharkhand</option>
                        <option value="Karnataka">Karnataka</option>
                        <option value="Kerala">Kerala</option>
                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                        <option value="Maharashtra">Maharashtra</option>
                        <option value="Manipur">Manipur</option>
                        <option value="Meghalaya">Meghalaya</option>
                        <option value="Mizoram">Mizoram</option>
                        <option value="Nagaland">Nagaland</option>
                        <option value="Odisha">Odisha</option>
                        <option value="Punjab">Punjab</option>
                        <option value="Rajasthan">Rajasthan</option>
                        <option value="Sikkim">Sikkim</option>
                        <option value="Tamil Nadu">Tamil Nadu</option>
                        <option value="Telangana">Telangana</option>
                        <option value="Tripura">Tripura</option>
                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                        <option value="Uttarakhand">Uttarakhand</option>
                        <option value="West Bengal">West Bengal</option>
                    </select>
                    <label for="role">Are You?</label>
                    <p><input type="radio" name="role" id="role" value="farmer"> Farmer (Selling crop)</p>
                    <p><input type="radio" name="role" id="role" value="merchant"> Merchant (Buying Crop)</p>
                    <label for="mobile">Enter Mobile Number</label>
                    <input type="text" id="mobile" name="mobile">
                    <label for="pass">Enter Password</label>
                    <input type="password" name="pass" id="pass">
                    <button type="submit" name="submit">Submit</button>
                </form>
                <h3>Already Registered?</h3>
                <a href="index.php">Login Here</a>
            </div>
        </section>
    </div>
</body>
</html>