<?php
session_start();
//Check for SESSION
if(!$_SESSION['valid'])
{
	header("Location:./login.php");
	exit();
}
  $courseid = $_POST['courseid'];//Get courseid from index.php
  $courseid = strip_tags($courseid);
  //SQL injection prevention
  if (preg_match('#(DROP|INSERT|UPDATE|TABLE|DELETE|;)#i',$courseid))
  {
    $_SESSION['error']='injection';
    header("Location: ./error.php");
    exit();
  }
  //End SQL injection prevention
  $connect = new PDO('sqlite:./db/db.sqlite');
  $uploaders = $connect->query("SELECT * FROM uploaded WHERE course = '$courseid' ORDER BY number;");
  $array = $connect->query("SELECT * FROM course WHERE id = '$courseid';");
 ?>
<!DOCTYPE html>
<html lang="zh">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>课程信息</title>

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
        <h2>课程信息</h2>
        <table align='center'><tr align='center'>
        <tr><th>课程名称</th><th>课程ID</th><th>分类名称</th><th>分类ID</th></tr>
        <?php foreach ($array as $info)
        {
            echo "<tr><td>".$info['name']."</td><td>".$info['id']."</td><td>".$info['category']."</td><td>".$info['categoryid']."</td></tr>";
        }
        ?>
        </table>
    </div>

    <div class='jumbotron' style="opacity: 0.8">
        <h2>上传情况</h2>
        <table align='center'><tr align='center'>
    <tr><th>学号</th><th>姓名</th><th>IP</th><th>上传日期</th></tr>
<?php
foreach($uploaders as $row)
{
        echo "<tr><td>".$row['number']."</td><td>".$row['name']."</td><td>".$row['ip']."</td><td>".$row['time']."</td></tr>";
}
        echo "</table>";
?>
</div>

  </div> <!-- /container -->
  <?php include('./partial/footer.php') ?>
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
