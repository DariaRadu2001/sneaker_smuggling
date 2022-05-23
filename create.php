<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "sneakers");
if (isset($_POST['email'])) {

    // verificam daca s-au completat formurile, cu un default value daca nu au fost completate.
    // posibil aici sa facem si o validare in care verificam daca putem folosii datele de la user.
    $parola = md5($_POST['parola']);

    // cauta daca exista un rand cu id-ul respectiv
    $stmt = $mysqli->prepare("SELECT * FROM clienti WHERE email = ?");
    $stmt->bind_param("s", $_POST['email']);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($result->num_rows > 0)
    {

        header("Location: error_user_existent.html");
    }
    else {

        $createStmt = $mysqli->prepare("INSERT INTO clienti (email, parola) VALUES (?, ?)");
        $createStmt->bind_param("ss", $_POST['email'], $parola);
        $createStmt->execute();
        $createStmt->close();
        header("Location: login.php");

    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="login.css">
    <meta charset="UTF-8">
    <title>Sneakers Smuggling</title>
    <style>
        body {font-family: Arial, Helvetica, sans-serif;}
        form {border: 3px solid #f1f1f1;}


    </style>
</head>
<body>

<div class="header">
    <h1>Sneakers Smuggling</h1>
</div>
<br>
<div class="form">
    <form action="create.php" method="post">
        <div class="imgcontainer">
            <img src="poze/avatar.jpg" alt="Avatar" class="avatar" style="object-fit: fill; height: 250px; width: 250px">
        </div>

        <div class="container">
            <label for="text"><div class="b"><b>Email</b></div> </label>
            <input type="text" placeholder="Enter Email" name="email" required>

            <label for="psw"><div class="b"><b>Password</b></div></label>
            <input type="password" placeholder="Enter Password" name="parola" required>

            <button type="submit"><div class="b2">CREATE</div></button>

        </div>
    </form>
</div>

</body>
</html>
