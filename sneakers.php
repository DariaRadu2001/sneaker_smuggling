<?php include('header.php'); ?>

<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
    switch($_GET["action"]) {
        case "add":
            if(!empty($_POST["quantity"])) {
                $productByCode = $db_handle->runQuery("SELECT * FROM sneakers WHERE s_id='" . $_GET["s_id"] . "'");
                $itemArray = array($productByCode[0]["s_id"]=>array('name'=>$productByCode[0]["name"], 'marime'=>$productByCode[0]["marime"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'image'=>$productByCode[0]["image"]));

                if(!empty($_SESSION["cart_item"]))
                {
                    if(in_array($productByCode[0]["s_id"],array_keys($_SESSION["cart_item"])))
                    {
                        foreach($_SESSION["cart_item"] as $k => $v)
                        {
                            if($productByCode[0]["s_id"] == $k)
                            {
                                if(empty($_SESSION["cart_item"][$k]["quantity"]))
                                {
                                    $_SESSION["cart_item"][$k]["quantity"] = 0;
                                }
                                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                            }
                        }
                    }
                    else
                    {
                        $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
                    }
                }
                else
                {
                    $_SESSION["cart_item"] = $itemArray;
                }
            }
            break;


        case "empty":
            unset($_SESSION["cart_item"]);
            break;

        case "buy":

            header("Location: buy.html");
            $mysqli = new mysqli("localhost", "root", "", "sneakers");

            $productByCode = $db_handle->runQuery("SELECT * FROM sneakers WHERE s_id='" . $_GET["s_id"] . "'");
            if(in_array($productByCode[0]["s_id"],array_keys($_SESSION["cart_item"])))
            {
                //imi ia fiecare element din cos
                foreach($_SESSION["cart_item"] as $k => $v)
                {
                    $createStmt = $mysqli->prepare("INSERT INTO buy (email, s_id) VALUES (?, ?)");
                    $createStmt->bind_param("ss", $_SESSION["client"],$id);
                    $id = $_SESSION["cart_item"][$k]["name"];
                    $createStmt->execute();

                }
                $createStmt->close();
            }

            unset($_SESSION["cart_item"]);
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="sneakers.css">
    <title>Sneakers Smuggling</title>
</head>
<body>

<div>
<form method="post" action="sneakers.php">
    <br>
    <label for="order">SORT BY PRICE:</label>
    <select name="order" id="order">
        <option value="ASC"> Low to High </option>
        <option value="DESC"> High to Low </option>
    </select>
    <button class="button" type="submit">Sort</button>
</form>
<br>
    <div class = "box">
    <img src="poze/cart.png" alt="cos" height=40px width=30px align="left">
    <p>Shopping Cart</p>
    <button class="button" type="button"><a href="sneakers.php?action=empty">Empty Cart</a></button>
    <button class="button" type="button"><a href="sneakers.php?action=buy">Buy</a></button>

    </div>


    <?php
    if(isset($_SESSION["cart_item"]))
    {
        $total_quantity = 0;
        $total_price = 0;
        ?>
        <table class="tbl-cart" cellpadding="10" cellspacing="1">
            <tr>
                <th style="text-align:left;">Name</th>
                <th style="text-align:left;">Size</th>
                <th style="text-align:right;" width="5%">Quantity</th>
                <th style="text-align:right;" width="10%">Unit Price</th>
                <th style="text-align:right;" width="10%">Price</th>
            </tr>
            <?php
            foreach ($_SESSION["cart_item"] as $item){
                $item_price = $item["quantity"]*$item["price"];
                ?>
                <tr>
                    <td><img src="<?php echo "poze/".$item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
                    <td><?php echo $item["marime"]; ?></td>
                    <td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
                    <td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
                    <td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>

                </tr>
                <?php
                $total_quantity += $item["quantity"];
                $total_price += ($item["price"]*$item["quantity"]);
            }
            ?>

            <tr>
                <td colspan="2" align="right">Total:</td>
                <td align="right"><?php echo $total_quantity; ?></td>
                <td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
                <td></td>
            </tr>
            </tbody>
        </table>
        <?php
    } else {
        ?>
        <div class="no-records">Your Cart is Empty</div>
        <?php
    }
    ?>


<div id="product-grid">
    <div class="header"><h3>Products</h3></div>
    <br><br><br>
    <?php
    if (!empty($_POST["order"]))
    {
        $order = ($_POST["order"]);
        if ($order == 'ASC')
            $product_array = $db_handle->runQuery("SELECT * FROM sneakers ORDER BY price ASC");
        else
            $product_array = $db_handle->runQuery("SELECT * FROM sneakers ORDER BY price DESC");
    }
    else
    {
        $product_array = $db_handle->runQuery("SELECT * FROM sneakers ORDER BY price ASC");
    }
    if (!empty($product_array)) {
        foreach($product_array as $key=>$value){
            ?>
            <div class="product-item">
                <form method="post" action="sneakers.php?action=add&s_id=<?php echo $product_array[$key]["s_id"]; ?>">
                    <div class="product-image"><img src="<?php echo "poze/".$product_array[$key]["image"]; ?>"></div>
                    <div class="product-tile-footer">
                        <div class="product-title"><?php echo $product_array[$key]["name"]; ?></div><br><br>
                        <div class="product-price"><?php echo "PRICE: ".$product_array[$key]["price"]."LEI"; ?></div>
                        <?php echo "<br>SIZE: ".$product_array[$key]["marime"]; ?>
                        <div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" />
                            <input type="submit" value="Add to Cart" class="button" /></div>
                    </div>
                </form>
            </div>
            <?php
        }
    }
    ?>
</div>
</div>
