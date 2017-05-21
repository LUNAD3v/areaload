<?php
$upconnect = new PDO('sqlite:./db/db.sqlite');
$search = $upconnect->query("SELECT * FROM problem");
?>
<!DOCTYPE html>
<html lang="zh">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>List</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="./css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="./css/mdb.min.css" rel="stylesheet">


</head>

<body>
<img src="./img/problem.jpg" style="position: fixed;width: 100%; opacity: 0.6; z-index: -100" alt="">
<?php include('nav.php') ?>

      <div class="container">


    <?php
    foreach($search as $row)
    {
            echo "<div class='jumbotron' style=\"opacity: 0.8\">";
            echo "<h1>";
            echo $row['number'];
            echo "</h1>";
            echo "<p>";
            echo $row['content'];
            echo "</p>";
            echo "</div>";
    }
    ?>



      </div>
      <?php include('footer.php') ?>
    <!-- SCRIPTS -->

    <!-- JQuery -->
    <script type="text/javascript" src="./js/jquery-3.1.1.min.js"></script>

    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="./js/tether.min.js"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="./js/bootstrap.min.js"></script>

    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="./js/mdb.min.js"></script>



</body>

</html>
