<?php
include('conn.php');
session_start();
$mobile = $_SESSION['mobile'];
if(!$mobile){
	header('Location:index.php');
}
if(isset($_POST['submit'])){
    $name = strtolower($_POST['name']);
    $crop_name = strtolower($_POST['crop_name']);
    $details = strtolower($_POST['details']);
    $qty = $_POST['qty'];
    $metric = $_POST['metric'];
    $min = $_POST['min'];
    $max = $_POST['max'];
    $address = strtolower($_POST['address']);
    $village = strtolower($_POST['village']);
    $city = strtolower($_POST['city']);
    $district = strtolower($_POST['district']);
    $state = $_POST['state'];
    $mobile = $_POST['mobile'];
    
    
    $q = $db->prepare("INSERT INTO crop (name, crop_name, details, qty, metric, min, max, address, village, city, district, state, mobile) VALUES (:name, :crop_name, :details, :qty, :metric, :min, :max, :address, :village, :city, :district, :state, :mobile)");
    $q->bindValue('name',$name);
    $q->bindValue('crop_name',$crop_name);
    $q->bindValue('details',$details);
    $q->bindValue('qty',$qty);
    $q->bindValue('metric',$metric);
    $q->bindValue('min',$min);
    $q->bindValue('max',$max);
    $q->bindValue('address',$address);
    $q->bindValue('village',$village);
    $q->bindValue('city',$city);
    $q->bindValue('district',$district);
    $q->bindValue('state',$state);
    $q->bindValue('mobile',$mobile);
    if($q->execute()){
        echo "<script>alert('Donor Registration Successful.')</script>";
        header('Location:farmer.php');
    }
    else{
        echo "<script>alert('Donor Registration Failed.')</script>";
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
                <h2>Give Crop Details</h2>
                <div class="form">
                    <form action="" method="post">
                    <label for="name">Enter Name</label>
                    <input type="text" id="name" name="name">
                    <label for="crop_name">Enter Crop Type</label>
                    <select id="crop_name" name="crop_name">
                        <option disabled selected value>Select current role</option>
                        <option value="wheat">Wheat</option>
                        <option value="rice">Rice</option>
                        <option value="pulses">Pulses</option>
                        <option value="sugarcane">Sugarcane</option>
                        <option value="others">Others</option>
                    </select>
                    <label for="details">Enter Crop Details</label>
                    <input type="text" id="details" name="details">
                    <label for="qty">Quantity Available</label>
                    <input type="number" id="qty" name="qty">
                    <label for="metric">Measurement Unit</label>
                    <select id="metric" name="metric">
                        <option disabled selected value>Select Quantity Metric</option>
                        <option value="kg">Kg</option>
                        <option value="quintal">Quintal</option>
                        <option value="tonn">Tonn</option>
                    </select>
                    <label for="price">Enter Price Range</label>
                    <label for="min">Enter Minimum Price</label>
                    <input type="number" id="min" name="min">
                    <label for="max">Enter Maximum Price</label>
                    <input type="number" id="max" name="max">
                    <label for="address">Enter Address</label>
                    <textarea name="address" id="address" cols="30" rows="10"></textarea>
                    <label for="village">Enter Village Name</label>
                    <input type="text" id="village" name="village">
                    <label for="city">Enter City Name</label>
                    <input type="text" id="city" name="city">
                    <label for="district">Enter District Name</label>
                    <input type="text" id="district" name="district">
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
                    <label for="mobile">Enter Mobile Number</label>
                    <input type="text" id="mobile" name="mobile">
                    <button type="submit" name="submit">Submit</button>
                    </form>
                </div>
            </div>
        </section>
        <footer>&copy; Grazier</footer>
    </div>
</body>
</html>