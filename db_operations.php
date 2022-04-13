<?php

// ia toate randurile din db
$mysqli = new mysqli("localhost", "root", "", "sneakers");
$stmt = $mysqli->prepare("SELECT * FROM clienti");
$stmt->execute();
$result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
$stmt->close();
?>

<h2>Lista clienti</h2>
<table>
    <thead>
    <th>Email</th>
    <th>parola</th>
    </thead>
    <tbody>
    <?php
    foreach ($result as $row) {
        ?>
        <tr>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['parola'] ?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>