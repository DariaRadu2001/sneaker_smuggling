<?php
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

// daca exista => update
    if ($result->num_rows > 0) {
        $updateStmt = $mysqli->prepare("UPDATE clienti SET parola = ? WHERE email = ?");

        $updateStmt->bind_param("ss", $parola, $_POST['email']);
        $updateStmt->execute();
        var_dump($updateStmt);
        $updateStmt->close();
        header('Location: login.php');
    } else {
// daca nu exista => eroare
        header("Location: error_not_user.html");
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
<form action="ciuspass.php" method="post">
    <div class="imgcontainer">
        <img src="poze/avatar.jpg" alt="Avatar" class="avatar" style="object-fit: fill; height: 250px; width: 250px">
    </div>


    <div class="form">
        <form method="post" action="login.php">
            <div>
                <label>
                    <div class="b"><b>Email</b></div>
                    <input type="text" placeholder="Enter Email" name="email" value=""/>
                </label>
            </div>
            <div>
                <label>
                    <div class="b"><b>New Password</b></div>
                    <input type="password" placeholder="Enter New Password" name="parola" value=""/>
                </label>
            </div>
            <button type="submit"><div class="b2">Update Password</div></button>
        </form>
    </div>

</form>


</body>
</html>