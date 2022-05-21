<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="contact.css">
    <title>Sneakers Smuggling</title>
</head>

<div class="navbar">
    <imga><img src="poze/logo.png" alt="logo"  height=100px width=100px></imga>
    <a href="main.php">Home</a>
    <a href="sneakers.php">Sneakers</a>
    <a href="contact.php">Contact</a>
    <form method="post" action="logout.php">
        <a href="login.php">Log_out</a>
    </form>

    <div align="right">
    <form method="post" action="search.php">
        <label for="search"></label><input type="text" placeholder="Enter Name" id="search" name="search" value=""><br><br>
        <button type="submit"><div class="btn">Search</div></button>
    </form></div>

</div>
</html>