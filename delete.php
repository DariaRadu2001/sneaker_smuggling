<?php
$mysqli = new mysqli("localhost", "root", "", "sneakers");
if (isset($_POST['email'])) {

    $parola = md5($_POST['parola']);
    // cauta daca exista un rand cu id-ul respectiv
    $stmt = $mysqli->prepare("SELECT * FROM clienti WHERE email = ?");
    $stmt->bind_param("s", $_POST['email']);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($result->num_rows > 0)
    {
        $stmt2 = $mysqli->prepare("SELECT parola FROM clienti WHERE email = ?");
        $stmt2->bind_param("s", $_POST['email']);
        $stmt2->execute();
        $result = $stmt2->get_result();
        $result2 = mysqli_fetch_assoc($result);
        $parola_db = $result2["parola"];
        $stmt2->close();

        if($parola_db == $parola)
        {
            $createStmt = $mysqli->prepare("DELETE FROM clienti WHERE email=?");
            $createStmt->bind_param("s", $_POST['email']);
            $createStmt->execute();
            $createStmt->close();
            header("Location: login.php");
        }
        else {

            header("Location: error_not_user.html");

        }

    }
    else
    {

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
<div class="form">
    <form action="delete.php" method="post">
        <div class="imgcontainer">
            <img src="poze/avatar.jpg" alt="Avatar" class="avatar" style="object-fit: fill; height: 250px; width: 250px">
        </div>

        <div class="container">
            <label for="text"><div class="b"><b>Email</b></div> </label>
            <input type="text" placeholder="Enter Email" name="email" value=""/>


            <label>
                <div class="b"><b>Password</b></div>
                <input type="password" placeholder="Enter Password" name="parola"  value=""/>
            </label>


            <button type="submit"><div class="b2">DELETE</div></button>

        </div>
    </form>
</div>

</body>
</html>
