<?php
include('conn.php');
session_start();
$mobile = $_SESSION['mobile'];
if(!$mobile){
	header('Location:index.php');
}
if(isset($_POST['wish'])){
    $mark = $_POST['wish'];
    $q = $db->prepare("INSERT INTO m_wish (mobile, mark) VALUES (:mobile, :mark)");
    $q->bindValue('mobile',$mobile);
    $q->bindValue('mark',$mark);
    $q->execute();
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
                <h3>Details of Crop Produce</h3>
                <a href="m_wishlist.php">Check Your Wishlist</a>
                <div class="table">
                    <table id="data" style="width: 100%; border: 2px solid black; font-size: 24px">
                        <tr id="t_head">
                            <td class="h_item"style="border: 1px solid black;">Name</td>
                            <td class="h_item"style="border: 1px solid black;">Crop Name</td>
                            <td class="h_item"style="border: 1px solid black;">Crop Quantity</td>
                            <td class="h_item"style="border: 1px solid black;">Quantity Metric</td>
                            <td class="h_item"style="border: 1px solid black;">Minimum Price</td>
                            <td class="h_item"style="border: 1px solid black;">Maximum Price</td>
                            <td class="h_item"style="border: 1px solid black;">District</td>
                            <td class="h_item"style="border: 1px solid black;">State</td>
                            <td class="h_item"style="border: 1px solid black;">Show Interest</td>
                            </td>
                        </tr>
                        <?php
                            $q=$db->query("SELECT * FROM crop");
                            while($r1=$q->fetch(PDO::FETCH_OBJ)){
                                ?>
                                <tr class="t_row" style="width: 100%; border: 1px solid black; font-size: 20px">
                                    <td class="item" style="border: 1px solid black;"><?= $r1->name; ?></td>
                                    <td class="item" style="border: 1px solid black;"><?= $r1->crop_name; ?></td>
                                    <td class="item" style="border: 1px solid black;"><?= $r1->qty; ?></td>
                                    <td class="item" style="border: 1px solid black;"><?= $r1->metric; ?></td>
                                    <td class="item" style="border: 1px solid black;"><?= $r1->min; ?></td>
                                    <td class="item" style="border: 1px solid black;"><?= $r1->max; ?></td>
                                    <td class="item" style="border: 1px solid black;"><?= $r1->district; ?></td>
                                    <td class="item" style="border: 1px solid black;"><?= $r1->state; ?></td>
                                    <td class="item" style="border: 1px solid black;"><form action="" method="POST"><button name="wish" value="<?= $r1->id; ?>">Add to Wishlist</button>
                                    </form></td>
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

