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
          if ( !empty($_POST['username']) && !empty($_POST['passwd']) )
               {
               if ($_POST['username'] == 'nginx' &&
                  $_POST['passwd'] == 'apache')
                  {
                  $_SESSION['valid'] = true;
                  header("Location:./admin.php");
                  exit();
                }
              }
 ?>

        <div class="jumbotron" style="opacity: 0.8">
        <form action="login.php" method="post">
          <h2 class="form-signin-heading h2-responsive wow fadeInLeft">欢迎登录AreaLoad</h2>
          <input type="text" name="username" class="form-control" placeholder="用户名" required autofocus>
          <input type="password" name="passwd" class="form-control" placeholder="密码" required>
          <button class="btn btn-lg btn-primary btn-block" input type="submit">登录</button>
        </form>
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
