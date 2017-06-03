<?php
  session_start();
  $number1 = rand(0,30);
  $number2 = rand(0,10);
  $result = $number1 + $number2;
  $connect = new PDO('sqlite:./db/db.sqlite');
  $array = $connect->query("SELECT * FROM course;");

 ?>
<!DOCTYPE html>
<html lang="zh">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>AreaLoad文件上传系统</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="./css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="./css/mdb.min.css" rel="stylesheet">


</head>

<body>
<img src="./img/bg.jpg" style="position: fixed;width: 100%; opacity: 0.6; z-index: -100" alt="">

<?php include('./partial/nav.php') ?>

  <div class="container">

    <div class="jumbotron" style="opacity: 0.8">
          <h1>欢迎来到AreaLoad</h1>
          <small>Autonomous Rubost External Area Upload System</small>
          <p class="lead">一个稳定，健壮的文件上传平台！</p>
        </div>

  <div class="jumbotron" style="opacity: 0.8">


	<?php
  foreach($array as $row)
  {
    $color = array("success", "info", "warning", "danger");
    $eachcolor = $color[mt_rand(0, count($color) - 1)];
    echo "<div class=\"alert alert-" . $eachcolor ."\"" . "role=\"alert\">";
    echo "<div class=\"row\">";
    echo "<div class=\"col-sm-6 col-md-10\">";

    echo "<h3>" . $row['name'] . "<h3>";

    echo "</div><!-- col -->";
    echo "<div class=\"col-sm-6 col-md-2\">";

    echo "<form action=\"select.php\" method=\"post\">";
    echo "<input type=\"hidden\" name=\"courseid\" value=\"" . $row['id'] ."\"" . "></input>";
    echo "<button class=\"btn btn-lg btn-danger btn-block\" input type=\"submit\">提交作业</button>";
    echo "</form>";

    echo "</div><!-- col -->";
    echo "</div><!-- row -->";
    echo "</div><!-- alert -->";

  }
?>


	</div><!-- col-sm-6 col-md-2-->

</div>

  </div> <!-- /container -->
  <?php include('./partial/footer.php') ?>
    <!-- SCRIPTS -->
<script>
function cli(){
	var na=document.getElementById("fileSelect").value;
	if(na!=''){
	document.getElementById("na").value=na;}
	else
		document.getElementById("na").value="当前未选择文件";
	}
</script>
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
