<?php
$connect = new PDO('sqlite:./db/db.sqlite');
$array = $connect->query("SELECT * FROM course;");
$tickets = $connect->query("SELECT * FROM problem");
?>
<!DOCTYPE html>
<html lang="zh">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>管理界面</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="./css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="./css/mdb.min.css" rel="stylesheet">
</head>

<body>
<img src="./img/admin.jpeg" style="position: fixed;width: 100%; opacity: 0.2; z-index: -100" alt="">
<?php include('nav.php') ?>
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-12">
            <div class="page-header">
                <h1>课程列表</h1>
              </div><!--/ header -->
              <ul class="list-group">
              <?php
              foreach ($array as $course) {
                $eachcourseid = $course['id'];
                $counts = $connect->query("SELECT COUNT(*) FROM uploaded WHERE course = '$eachcourseid';");
                $count = $counts->fetchColumn();
                echo "<li class=\"list-group-item\">";
                echo "<span class=\"badge\">". $count . "</span>";
                echo $course['name'];
                echo "</li>";
              }
                ?>
            </ul>
            <div class="panel panel-success">
              <div class="panel-heading">添加课程</div>
              <div class="panel-body">
              <form action="course.php" method="post">
              <input type="text" name="addcoursename" class="form-control" placeholder="课程名称（例：Web技术基础）" required>
              <input type="text" name="addcourseid" class="form-control" placeholder="课程ID（例：web）" required>
              <textarea input type="text" class="form-control" rows="2" name="addcourseinfo" placeholder="课程介绍" required></textarea>
              <textarea input type="text" class="form-control" rows="5" name="addcoursedemand" placeholder="课程要求" required></textarea>
              <button class="btn btn-lg btn-danger btn-block" input type="submit">添加</button>
              </form>
              </div>
            </div>

          </div><!--<div class="col-md-6 col-sm-12">-->
          <div class="col-md-6 col-sm-12">
            <div class="page-header">
                <h1>Tickets</h1>
              </div><!--/ header -->
              <ul class="list-group">
              <?php
              foreach ($tickets as $ticket) {
                echo "<li class=\"list-group-item\">";
                echo "<b>".$ticket['number']."</b>" . "| ";
                echo $ticket['content'];
                echo "</li>";
              }
                ?>
            </ul>
          </div><!--<div class="col-md-6 col-sm-12">-->
        </div><!--/row-->

      </div> <!-- /container -->
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
