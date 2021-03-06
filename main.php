<?php include('header.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Sneakers Smuggling</title>
</head>

<div class="box">

    <div class="header">
        <h1>Recommendation</h1><br></div>
    <!--pozele de la recomandate-->
    <table style="width:100%">
        <tr>
            <th>
                <a href="s3.php">
                    <img src="poze/s3.jpg" alt="s3" height=214px width=220px style="object-fit: contain">
                </a>
            </th>

            <td>
                <a href="s5.php">
                    <img src="poze/s5.jpg" alt="s5" height=200px width=220px style="object-fit: contain">
                </a>
            </td>

            <td>
                <a href="s4.php">
                    <img src="poze/s4.jpg" alt="s4" height=174 width=220px style="object-fit: contain">
                </a>
            </td>

            <td>
                <a href="s1.php">
                    <img src="poze/s1.jpg" alt="s1" height=167 width=220px style="object-fit: contain">
                </a>
            </td>

            <td>
                <a href="s2.php">
                    <img src="poze/s2.jpg" alt="s2" height=183 width=220px style="object-fit: contain">
                </a>
            </td>

    </table>
</div>
<br>
<div class="container">

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
            <li data-target="#myCarousel" data-slide-to="4"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="poze/many.jpg" alt="many" style="object-fit: contain;width:100%; height:100%" >
            </div>

            <div class="item">
                <img src="poze/zid.jpg" alt="zid" style="object-fit: contain;width:100%; height:100%">
            </div>

            <div class="item">
                <img src="poze/cos.jpg" alt="cos" style="object-fit: contain;width:100%; height:100%">
            </div>

            <div class="item">
                <img src="poze/cuplu.jpg" alt="cuplu" style="object-fit: contain;width:100%; height:100%">
            </div>

            <div class="item">
                <img src="poze/levitat.jpg" alt="levitat" style="object-fit: contain;width:100%; height:100%">
            </div>

            <div class="item">
                <img src="poze/offWhite.jpg" alt="off" style="object-fit: contain;width:100%; height:100%">
            </div>

        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

</html>
