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
                <h2>Farmer Dashboard</h2>
                <h3>Merchants Willing to buy</h3>
                <div class="table">
                    <table id="data" style="width: 100%; border: 2px solid black; font-size: 24px">
                        <tr id="t_head">
                        <td class="h_item"style="border: 1px solid black;">Name</td>
                        <td class="h_item"style="border: 1px solid black;">Address</td>
                        <td class="h_item"style="border: 1px solid black;">City</td>
                        <td class="h_item"style="border: 1px solid black;">State</td>
                        <td class="h_item"style="border: 1px solid black;">Bid Made</td>
                        <td class="h_item"style="border: 1px solid black;">Quantity Required</td>
                        </tr>
                        <?php
                            $q=$db->query("SELECT * FROM f_bid WHERE mobile='$mobile'");
                            while($r1=$q->fetch(PDO::FETCH_OBJ)){
                                ?>
                                <?php
                            }
                        ?>
                    </table>
                </div>
            </div>
        </section>
        <footer>&copy; Grazier</footer>
    </div>
</body>
</html>

