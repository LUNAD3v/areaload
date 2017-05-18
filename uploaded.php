<?php
$upconnect = new PDO('sqlite:./db/db.sqlite');
$uploaders = $upconnect->query("SELECT * FROM uploaded");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>已经上传的学生列表</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="./css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="./css/mdb.min.css" rel="stylesheet">
<style>
	table{
		width:100%;
	}
</style>

</head>

<body>
  
<?php include('nav.php') ?>
      <div class="container">


        <div class='jumbotron' style="opacity: 0.8">
    <?php


		echo "<table align='center'><tr align='center'>";

		echo "<tr><th>学号</th><th>姓名</th><th>文件名</th><th>上传课程</th></tr>";


        foreach($uploaders as $row)
        {
			echo "<tr><td>".$row['number']."</td><td>".$row['name']."</td><td>".$row['filename']."</td><td>".$row['course']."</tr>";
        }
		echo "</table>";
    ?>

      </div> <!-- /container -->
      <?php include('footer.php') ?>
      <aside id="aside" class="sidebar col-sm-3 col-md-2 hidden-print small">
        <div class="sidebar-content">
            <div class="sidebar-body collapse in">
                <p>
                    <img src="./img/uploaded.jpg" style="position: fixed; bottom: -180px; left: -230px; opacity: 0.6; z-index: -100" alt="">
                </p>
            </div>
        </div>
    </aside>
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
