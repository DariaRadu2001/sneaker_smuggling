<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="header.css">
    <title>Sneakers Smuggling</title>
</head>

<div class="topnav">

    <a href="main.php"><div class="logo-image"><img src="poze/logo.png" class="img-fluid" alt="logo"></div></a>
    <a href="main.php">Home</a>
    <a href="sneakers.php">Sneakers</a>
    <a href="contact.php">Contact</a>
    <form method="post" action="logout.php">
        <a href="login.php">Log_out</a>
    </form>

    <div align="right">
    <form method="post" action="search.php">
        <label for="search"></label><input type="text" placeholder="Enter Name" id="search" name="search" value=""><br>
        <button class="button" type="submit">Search</button>
    </form></div>



</div>
</html>