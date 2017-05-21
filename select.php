<?php
  $number1 = rand(0,30);
  $number2 = rand(0,10);
  $result = $number1 + $number2;

//If no post data from index, redirect to index.php
  if(!$_POST['courseid'])
  {
    header("Location: ./index.php");
    exit();
  }

  $courseid = $_POST['courseid'];//Get courseid from index.php
  $connect = new PDO('sqlite:./db/db.sqlite');
  $coursenamearray = $connect->query("SELECT name FROM course WHERE id LIKE '$courseid';");
  $courseinfoarray = $connect->query("SELECT info FROM course WHERE id LIKE '$courseid';");
  $coursedemandarray = $connect->query("SELECT demand FROM course WHERE id LIKE '$courseid';");
 ?>
<!DOCTYPE html>
<html lang="zh">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title><?php
  foreach ($coursenamearray as $realcoursename) {
    echo $realcoursename[0];
  }
  ?>作业上传</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="./css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="./css/mdb.min.css" rel="stylesheet">


</head>

<body>
<img src="./img/network.jpg" style="position: fixed;width: 100%; opacity: 0.6; z-index: -100" alt="">

<?php include('nav.php') ?>

  <div class="container">


	<div class="jumbotron" style="opacity: 0.8">

		<h2>
      <b><?php
    foreach ($coursenamearray as $realcoursename) {
      echo $realcoursename[0];
    }
    ?></b>
    上传要求</h2>
    <pre><?php
    foreach ($coursedemandarray as $realcoursedemand) {
      echo $realcoursedemand[0];
    }
    ?></pre>
    </div>

  <div class="jumbotron" style="opacity: 0.8">
    <h1>上传文件</h1>
    <form action="handler.php" method="post" enctype="multipart/form-data">

      <div class="row">
        <div class="col-lg-6 col-sm-6 col-xs-12">
          <input type="text" name="number" class="form-control" placeholder="学号" required autofocus>
          <input type="text" name="name" class="form-control" placeholder="姓名" required>
          <b>请算出答案：</b><input type="text" name="captcha" placeholder="<?php echo $number1?>+ <?php echo $number2?> = ?" required>
          文件名<input type="text" id="na"  placeholder="当前未选择文件...">
          <label class="btn btn-primary" for="fileSelect" >
                选择文件&hellip;
            </label><input type="file" id="fileSelect" name="userfile" style="visibility:hidden;" onchange="cli()">
            <input type="hidden" name="course" value="<?php echo $courseid?>"></input>
            <input type="hidden" name="num1" value="<?php echo $number1?>"></input>
            <input type="hidden" name="num2" value="<?php echo $number2?>"></input>
            <button class="btn btn-lg btn-danger btn-block" input type="submit">上传</button>
        </div><!--<div class="col-lg-6 col-sm-6 col-xs-12">-->

        <div class="col-lg-6 col-sm-6 col-xs-12">
          <p><?php
          foreach ($courseinfoarray as $realcourseinfo) {
          echo $realcourseinfo[0];
          }
          ?></p>
        </div><!--<div class="col-lg-6 col-sm-6 col-xs-12">-->

      </div><!--<div class="row">-->

</form>

</div>

  </div> <!-- /container -->
  <?php include('footer.php') ?>
    <!-- SCRIPTS -->
<script>
function cli(){
	var na=document.getElementById("fileSelect").files[0].name;
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
