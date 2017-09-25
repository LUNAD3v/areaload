<?php
session_start();
?>
<!DOCTYPE html>
<html lang="zh">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>AreaLoad | 登录</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="./css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="./css/mdb.min.css" rel="stylesheet">


</head>

<body style="background-image: url(./img/login.jpg); background-size: 100%;">
	<?php include('./partial/nav.php') ?>
  <div class="container" >

<?php
          if (!empty($_POST['username']) && !empty($_POST['passwd'])) {
              $username = $_POST['username'];
              $passwd = md5($_POST['passwd']);
              if ($username = 'nginx' && $passwd = '64ca4409cb77ebb70d878309180f0d0a') {
                  $_SESSION['valid'] = true;
                  $_SESSION['username'] = $_POST['username'];
                  header("Location:./admin.php");
                  exit();
              }
          }
 ?>
<div class="row">
    <div class="col-md-4 col-xs-12">

    </div>
    <div class="col-md-4 col-xs-12">
        <div class="jumbotron" style="opacity: 0.8">
        <form action="login.php" method="post">
          <h2 class="form-signin-heading h2-responsive wow fadeInLeft">登录AreaLoad</h2>
          <input type="text" name="username" class="form-control" placeholder="用户名" required autofocus>
          <input type="password" name="passwd" class="form-control" placeholder="密码" required>
          <button class="btn btn-lg btn-primary btn-block" input type="submit">登录</button>
        </form>
        </div>
    </div>
    <div class="col-md-4 col-xs-12">

    </div>

</div>



  </div> <!-- /container -->

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
