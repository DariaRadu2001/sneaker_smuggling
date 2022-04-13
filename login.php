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

// daca exista => 2 cazuri parola buna, parola proasta
    if ($result->num_rows > 0) {
        $stmt2 = $mysqli->prepare("SELECT parola FROM clienti WHERE email = ?");
        $stmt2->bind_param("s", $_POST['email']);
        $stmt2->execute();
        $result = $stmt2->get_result();
        $result2 = mysqli_fetch_assoc($result);

        $parola_db = $result2["parola"];
        $stmt2->close();

        if($parola_db == $parola)
        {
            header("Location: main.html");
        }
        else
        {
            header("Location: error_wrong_pass.html");
        }

    }
    else
    {
        header("Location: error.html");
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
<div class="imgcontainer">
    <img src="poze/avatar.jpg" alt="Avatar" class="avatar" style="object-fit: fill; height: 250px; width: 250px">
</div>


<div class="form">
    <form method="post" action="login.php">
        <div>
            <label>
                <div class="b"><b>Email</b></div>
                <input type="text" placeholder="Enter Email" name="email"  value=""/>
            </label>
        </div>
        <div>
            <label>
                <div class="b"><b>Password</b></div>
                <input type="password" placeholder="Enter Password" name="parola"  value=""/>
            </label>
        </div>
        <button type="submit"><div class="b2">Login</div></button>
    </form>
</div>

<label>
    <input type="checkbox" checked="checked" name="remember"> Remember me
</label>


<div class="container">
    <button type="button" class="createbtn"><div class="finut"><a href="create.php">Create account</a></div></button>
    <button type="button" class="createbtn"><div class="finut"><a href="delete.php">Delete account</a></div></button>
    <button type="button" class="ciuspass"><div class="finut">Forgot <a href="ciuspass.php">password?</a></div></button>
</div>


</body>
</html>