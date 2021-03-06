<?php
//If no post data from index(direct access to select.php), redirect to index.php
  if(!$_POST['courseid'] || !$_POST['coursecategoryid'])
  {
    header("Location: ./index.php");
    exit();
  }

  $courseid = $_POST['courseid'];//Get courseid from index.php
  $courseid = strip_tags($courseid);
  $coursecategoryid = $_POST['coursecategoryid'];
  $coursecategoryid = strip_tags($coursecategoryid);
  //SQL injection prevention
  if (preg_match('#(DROP|INSERT|UPDATE|TABLE|DELETE|;)#i',$courseid))
  {
    $_SESSION['error']='injection';
    header("Location: ./error.php");
    exit();
  }
  //End SQL injection prevention
  //SQL injection prevention
  if (preg_match('#(DROP|INSERT|UPDATE|TABLE|DELETE|;)#i',$coursecategoryid))
  {
    $_SESSION['error']='injection';
    header("Location: ./error.php");
    exit();
  }
  //End SQL injection prevention
  $connect = new PDO('sqlite:./db/db.sqlite');
  $uploaders = $connect->query("SELECT * FROM uploaded WHERE course='$courseid' ORDER BY number;");
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
<?php
foreach ($coursenamearray as $realcoursename) {
    $coursename = $realcoursename[0];
    echo "<title>" . $coursename ."作业上传</title>";
}
 ?>
    <title>作业上传</title>

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
<img src="./img/network.jpg" style="position: fixed;width: 100%; opacity: 0.6; z-index: -100" alt="">

<?php include('./partial/nav.php') ?>

  <div class="container">


	<div class="jumbotron">

		<h2>
      <b><?php
      echo $coursename;
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
          <img id="captcha" src="./captcha/securimage_show.php" alt="CAPTCHA Image" />
          <a href="#" onclick="document.getElementById('captcha').src = './captcha/securimage_show.php?' + Math.random(); return false">看不清，换一张</a>
          <input type="text" name="captcha" size="10" maxlength="6" placeholder="请输入验证码" required />
          文件名<input type="text" id="na"  placeholder="当前未选择文件...">
          <label class="btn btn-primary" for="fileSelect" >
                选择文件&hellip;
            </label><input type="file" id="fileSelect" name="userfile" style="visibility:hidden;" onchange="cli()">
            <input type="hidden" name="courseid" value="<?php echo $courseid?>"></input>
            <input type="hidden" name="coursecategoryid" value="<?php echo $coursecategoryid?>"></input>

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

<div class='jumbotron' style="opacity: 0.8">
<?php
        echo "<h2>已上传学生</h2>";
        echo "<table align='center'><tr align='center'>";
        echo "<tr><th>学号</th><th>姓名</th><th>文件名</th></tr>";

foreach($uploaders as $row)
{
        echo "<tr><td>".$row['number']."</td><td>".$row['name']."</td><td>".$row['filename']."</td></tr>";
}
        echo "</table>";
?>
</div>

  </div> <!-- /container -->
  <?php include('./partial/footer.php') ?>
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
