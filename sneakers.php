<?php
$mysqli = new mysqli("localhost", "root", "", "sneakers");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="sneakers.css">
    <title>Sneakers Smuggling</title>
</head>
<body>
<div class="navbar">
    <imga href="main.html"><img src="poze/logo.png" alt="logo" height=110 width=141></imga>
    <a href="main.html">Home</a>
    <a href="sneakers.php">Sneakers</a>
    <a href="contact.html">Contact</a>
    <a href="cos.html"><img src="poze/cart.png" alt="cos" height=30px width=30px style="object-fit: contain"></a>
</div>



<div class="box">

    <br><br><br>
    <br><br><br>
    <br><br><br>

    <div class="txt-heading">Shopping Cart</div>

    <a id="btnEmpty" href="sneakers.php?action=empty">Empty Cart</a>
    <?php
    if(isset($_SESSION["cart_item"]))
    {
        $total_quantity = 0;
        $total_price = 0;
        ?>
        <table class="tbl-cart" cellpadding="10" cellspacing="1">
            <tr>
                <th style="text-align:left;">Name</th>
                <th style="text-align:left;">Code</th>
                <th style="text-align:right;" width="5%">Quantity</th>
                <th style="text-align:right;" width="10%">Unit Price</th>
                <th style="text-align:right;" width="10%">Price</th>
                <th style="text-align:center;" width="5%">Remove</th>
            </tr>
            <?php
            foreach ($_SESSION["cart_item"] as $item){
                $item_price = $item["quantity"]*$item["price"];
                ?>
                <tr>
                    <td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
                    <td><?php echo $item["code"]; ?></td>
                    <td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
                    <td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
                    <td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
                    <td style="text-align:center;"><a href="sneakers.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="poze/icon-delete.png" alt="Remove Item" /></a></td>
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
</div>



<br><br><br>
    <table style="width:100%">
        <tr>
            <th>
                <a href="s1.html">
                    <img src="poze/s1.jpg" alt="s1" height=300px width=400px style="object-fit: contain">
                </a>
                <p>Nike Air Force 1 '07 PRM "Pastel Reveal" sneakers</p>
                <form action="/action_page.php">
                    <label for="marime"><div class="p2">Size:</div></label>
                    <select name="marime" id="marime">
                        <option value="35">35</option>
                        <option value="36">36</option>
                        <option value="40">40</option>
                        <option value="41">41</option>
                    </select>
                </form>
            </th>

            <td>
                <a href="s2.html">
                    <img src="poze/s2.jpg" alt="s2" height=300px width=400px style="object-fit: contain">
                </a>
                <p>Travis Scott x Air Jordan 1 Low 'Mocha'</p>
                <form action="/action_page.php">
                    <label for="marime"><div class="p2">Size:</div></label>
                    <select name="marime" id="marime">
                        <option value="40">40</option>
                        <option value="41">41</option>
                    </select>
                </form>
            </td>
        </tr>

        <tr>
            <th>
                <a href="s3.html">
                    <img src="poze/s3.jpg" alt="s3" height=300px width=400px style="object-fit: cover">
                </a>
                <p>Jordan 1 Retro High Court Purple White</p>
                <form action="/action_page.php">
                    <label for="marime"><div class="p2">Size:</div></label>
                    <select name="marime" id="marime">
                        <option value="39">39</option>
                        <option value="40">40</option>
                        <option value="45">45</option>
                    </select>
                </form>
            </th>

            <td>
                <a href="s4.html">
                    <img src="poze/s4.jpg" alt="s4" height=300px width=420px style="object-fit: cover">
                </a>
                <p>NIKE DUNK LOW Skateboard Sneakers</p>
                <form action="/action_page.php">
                    <label for="marime"><div class="p2">Size:</div></label>
                    <select name="marime" id="marime">
                        <option value="36">36</option>
                        <option value="37">37</option>

                    </select>
                </form>
            </td>
        </tr>

        <tr>
            <th>
                <a href="s5.html">
                    <img src="poze/s5.jpg" alt="s5" height=300px width=400px style="object-fit: cover">
                </a>
                <p>Comme Des Garçons Play x Converse</p>
                <form action="/action_page.php">
                    <label for="marime"><div class="p2">Size:</div></label>
                    <select name="marime" id="marime">
                        <option value="36">36</option>
                        <option value="37">37</option>
                        <option value="41">41</option>
                    </select>
                </form>

            </th>

        </tr>

    </table>
</div></body>
</html>
