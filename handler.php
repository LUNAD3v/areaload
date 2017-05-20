<?php
//Variables
$stunumber = $_POST["number"];
$stunumber = substr($stunumber,0,12);//Overflow prevention
$stuip = $_SERVER['REMOTE_ADDR'];
$stuname = $_POST['name'];
$filename = $_FILES['userfile']['name'];
$course = $_POST['course'];

//Begin Database connection
$upconnect = new PDO('sqlite:./db/db.sqlite');
$uploaders = $upconnect->query("SELECT * FROM uploaded");
//End Database connection
//Default safety
$accept = 1;

//Begin SELECT courseid for storage
//$courseid = $upconnect->query("SELECT 'id' FROM 'course' WHERE name LIKE '$course';");
//$realcourseid = $courseid->;
//End SELECT courseid for storage

//Prevent Duplication
foreach ($uploaders as $test_key) {
  if($stunumber == $test_key["number"])
  {
    header("Location: ./duplicate.html");
    exit();
  }
}
//End Duplication Prevention

//Student validation success, now is the captcha section
$usercaptcha=$_POST["captcha"];
$num1=$_POST["num1"];
$num2=$_POST["num2"];
$true=$num1+$num2;
if($usercaptcha != $true)
{
    $accept = 0;
}
//End captcha section

//If anything failed, return to upload page
if($accept != 1)
{
  header("Location: ./$course.php");
  exit();
}

//If success,keep uploading
$uploaddir = './';
$uploadfile = $uploaddir . $course . '/' . basename($_FILES['userfile']['name']);
$FileType = pathinfo($uploadfile,PATHINFO_EXTENSION)

?>
<!DOCTYPE html>
<html lang="zh">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>提交信息</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="./css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="./css/mdb.min.css" rel="stylesheet">


</head>

<body>

<?php include('nav.php') ?>

    <div class="container">


      <div class="page-header">
          <h1>上传信息</h1>
      </div><!--/ header -->
      <div class="jumbotron">
        <?php
        if (
          (
        $FileType == "7z"
        || $FileType == "rar"
        || $FileType == "zip"
          )
        && ($_FILES["userfile"]["size"] < 204800000))   // 小于 200 mb
		{
			if ($_FILES["userfile"]["error"] > 0)
			{
				echo "错误：: " . $_FILES["userfile"]["error"] . "<br>";
			}
			else
			{
				if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
          echo "<p>";
          echo "文件";
          echo $_FILES['userfile']['name'];
          echo "已经成功上传";
          echo "</p>";
          $upconnect->exec("INSERT INTO 'uploaded' ('number','ip','name','filename','course') VALUES ('$stunumber','$stuip','$stuname','$filename','$course');");
				} else {
					echo "<p>";
					echo "文件错误！";
					echo "</p>";
				}
				}
		}
		else
		{
			echo "文件格式不正确，请确认文件后缀名为zip、7z或者rar";
		}
	?>
      </div>
        </div>
      </div> <!-- /container -->
      <?php include('footer.php') ?>
      <aside id="aside" class="sidebar col-sm-3 col-md-2 hidden-print small">
        <div class="sidebar-content">
            <div class="sidebar-body collapse in">
                <p>
                    <img src="./img/success.jpg" style="position: fixed; bottom: -180px; left: -230px; opacity: 0.3; z-index: -100" alt="">
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
