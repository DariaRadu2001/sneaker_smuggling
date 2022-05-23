<?php include('header.php'); ?>

<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="sneakers.css">
    <title>Sneakers Smuggling</title>
</head>
<body>
<div id="product-grid">
    <div class="header"><h1>Products</h1></div>
    <br><br><br><br><br><br><br>
    <?php
    $suche = $_SESSION["suchen"];
    $product_array = $db_handle->runQuery("SELECT * FROM sneakers WHERE name LIKE '%$suche%'");
    if (!empty($product_array)) {
        foreach($product_array as $key=>$value){
            ?>
            <div class="product-item">
                <form method="post" action="sneakers.php?action=add&s_id=<?php echo $product_array[$key]["s_id"]; ?>">
                    <div class="product-image"><img src="<?php echo "poze/".$product_array[$key]["image"]; ?>"></div>
                    <div class="product-tile-footer">
                        <div class="product-title"><?php echo $product_array[$key]["name"]; ?></div>
                        <div class="product-price"><?php echo "PRICE: ".$product_array[$key]["price"]."LEI"; ?></div>
                        <?php echo "<br>SIZE: ".$product_array[$key]["marime"]; ?>
                    </div>
                </form>
            </div>
            <?php
        }
    }
    ?>
</div>
