<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "sneakers");
if (isset($_POST['search'])) {

    $search = ($_POST['search']);
    $stmt = $mysqli->prepare("SELECT * FROM sneakers WHERE name LIKE '%$search%'");
    $stmt->execute();
    $result = $stmt->get_result();
    $_SESSION["suchen"] = $search;
    $stmt->close();

    if ($result->num_rows > 0)
    {
        header("Location: found.php");
    }
    else
    {
        header("Location: not_found.php");
    }
}
?>