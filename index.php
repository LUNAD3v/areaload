<?php
  $number1 = rand(0,30);
  $number2 = rand(0,10);
  $result = $number1 + $number2;
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

<?php include('nav.php') ?>

  <div class="container">

    <div class="jumbotron" style="opacity: 0.8">
          <h1>欢迎来到AreaLoad</h1>
          <small>Autonomous Rubost External Area Upload System</small>
          <p class="lead">一个稳定，健壮的文件上传平台！</p>
        </div>

  <div class="jumbotron" style="opacity: 0.8">
    <div class="row">
    <div class="col-sm-6 col-md-2">
      <div class="thumbnail">
        <img src="./img/icon-web.png">
        <div class="caption">
          <h3>Web技术基础</h3>
        </div>
        <form action="select.php" method="post">
          <input type="hidden" name="course" value="web"></input>
          <button class="btn btn-lg btn-danger btn-block" input type="submit">提交作业</button>
        </form>
      </div>
    </div>
    <div class="col-sm-6 col-md-2">
      <div class="thumbnail">
        <img src="./img/icon-c.png">
        <div class="caption">
          <h3>C语言程序设计</h3>
        </div>
        <form action="select.php" method="post">
          <input type="hidden" name="course" value="c"></input>
          <button class="btn btn-lg btn-danger btn-block" input type="submit">提交作业</button>
        </form>
      </div>
    </div>
    <div class="col-sm-6 col-md-2">
      <div class="thumbnail">
        <img src="./img/icon-sec.png">
        <div class="caption">
          <h3>网络安全</h3>
        </div>
        <form action="select.php" method="post">
          <input type="hidden" name="course" value="sec"></input>
          <button class="btn btn-lg btn-danger btn-block" input type="submit">提交作业</button>
        </form>
      </div>
    </div>
    <div class="col-sm-6 col-md-2">
      <div class="thumbnail">
        <img src="./img/icon-cbase.png">
        <div class="caption">
          <h3>大学计算机基础</h3>
        </div>
        <form action="select.php" method="post">
          <input type="hidden" name="course" value="cbase"></input>
          <button class="btn btn-lg btn-danger btn-block" input type="submit">提交作业</button>
        </form>
      </div>
    </div>
    <div class="col-sm-6 col-md-2">
      <div class="thumbnail">
        <img src="./img/icon-network.png">
        <div class="caption">
          <h3>计算机网络</h3>
        </div>
        <form action="select.php" method="post">
          <input type="hidden" name="course" value="network"></input>
          <button class="btn btn-lg btn-danger btn-block" input type="submit">提交作业</button>
        </form>
      </div>
    </div>
  </div>
</div>

  </div> <!-- /container -->
  <?php include('footer.php') ?>
  <aside id="aside" class="sidebar col-sm-3 col-md-2 hidden-print small">
    <div class="sidebar-content">
        <div class="sidebar-body collapse in">
            <p>
                <img src="./img/bg.jpg" style="position: fixed; bottom: -180px; left: -230px; opacity: 0.6; z-index: -100" alt="">
            </p>
        </div>
    </div>
</aside>
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
