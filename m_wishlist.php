<?php
include('conn.php');
session_start();
$mobile = $_SESSION['mobile'];
if(!$mobile){
	header('Location:index.php');
}
if(isset($_POST['make_response'])){
    $bid = $_POST['bid'];
    $supply = $_POST['supply'];
    $q = $db->prepare("INSERT INTO f_bid (mobile, bid, supply) VALUES (:mobile,:bid,:supply)");
    $q->bindValue('mobile',$mobile);
    $q->bindValue('bid',$bid);
    $q->bindValue('supply',$supply);
    if($q->execute()){
        echo "<script>alert('Bid Placed Successfully.')</script>";
    }
    else{
        echo "<script>alert('Bid Failed.')</script>";
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
                <h2>Farmer Dashboard</h2>
                <h3>Details of Crop Produce</h3>
                <div class="table">
                    <table id="data" style="width: 100%; border: 2px solid black; font-size: 24px">
                        <tr id="t_head">
                            <td class="h_item"style="border: 1px solid black;">Name</td>
                            <td class="h_item"style="border: 1px solid black;">Crop Name</td>
                            <td class="h_item"style="border: 1px solid black;">Crop Details</td>
                            <td class="h_item"style="border: 1px solid black;">Crop Quantity</td>
                            <td class="h_item"style="border: 1px solid black;">Price Range</td>
                            <td class="h_item"style="border: 1px solid black;">District</td>
                            <td class="h_item"style="border: 1px solid black;">State</td>
                            <td class="h_item"style="border: 1px solid black;">Enter Your Bid</td>
                            <td class="h_item"style="border: 1px solid black;">Enter Quantity Required</td>
                            <td class="h_item"style="border: 1px solid black;">Make Submission</td>
                            <td class="h_item"style="border: 1px solid black;">Response</td>
                        </tr>
                        <?php
                            $q=$db->query("SELECT * FROM m_wish WHERE mobile='$mobile'");
                            while($r1=$q->fetch(PDO::FETCH_OBJ)){
                                $wish = $r1->mark;
                                $q1=$db->query("SELECT * FROM crop WHERE id='$wish'");
                                $ab=$q1->fetch(PDO::FETCH_OBJ);
                                ?>
                                <tr class="t_row" style="width: 100%; border: 1px solid black; font-size: 20px">
                                    <td class="item" style="border: 1px solid black;"><?= $ab->name; ?></td>
                                    <td class="item" style="border: 1px solid black;"><?= $ab->crop_name; ?></td>
                                    <td class="item" style="border: 1px solid black;"><?= $ab->details; ?></td>
                                    <td class="item" style="border: 1px solid black;"><?= $ab->qty; ?></td>
                                    <td class="item" style="border: 1px solid black;"><?= $ab->min; ?> - <?= $ab->max; ?></td>
                                    <td class="item" style="border: 1px solid black;"><?= $ab->district; ?></td>
                                    <td class="item" style="border: 1px solid black;"><?= $ab->state; ?></td>
                                    <form action="" method="post">
                                        <td class="item" style="border: 1px solid black;"><input type="text" name="bid"></td>
                                        <td class="item" style="border: 1px solid black;"><input type="text" name="supply"></td>
                                        <td class="item" style="border: 1px solid black;"><button value="make_response">Make Submission</button></td>
                                    </form>
                                    <td class="item" style="border: 1px solid black;"></td>
                                    </tr>
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

