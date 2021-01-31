<?php
include('conn.php');
session_start();
$mobile = $_SESSION['mobile'];
if(!$mobile){
	header('Location:index.php');
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
                <h2>Merchant Dashboard</h2>
                <p>Welcome User!</p>
                <h3>Facilities</h3>
                <ul>
                    <li><a href="merchant_buy.php">Buy Crop</a></li>
                    <li><a href="m_wishlist.php">Check my Wishlist</a></li>
                </ul>
            </div>
        </section>
        <footer>&copy; Grazier</footer>
    </div>
</body>
</html>