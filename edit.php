<?php
  session_start();
  $id = $_POST['editcourseid'];
  $connect = new PDO('sqlite:./db/db.sqlite');
  $infoarray = $connect->query("SELECT * FROM course WHERE id='$id';");
  foreach ($infoarray as $key)
  {
      $name = $key['name'];
      $demand = $key['demand'];
      $info  = $key['info'];
  }
 ?>
<!DOCTYPE html>
<html lang="zh">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>AreaLoad | 修改课程</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="./css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="./css/mdb.min.css" rel="stylesheet">


</head>

<body>
  <img src="./img/problem.jpg" style="position: fixed;width: 100%; opacity: 0.4; z-index: -100" alt="">

<?php include('./partial/nav.php') ?>

    <div class="container">

        <div class="panel panel-success">
          <div class="panel-heading">修改课程</div>
          <div class="panel-body">
          <form action="course.php" method="post">
          <input type="text" name="editcoursename" class="form-control" value="<?php echo $name?>" placeholder="课程名称（例：Web技术基础）" required>
          <input type="text" name="editcourseid" class="form-control" value="<?php echo $id?>" placeholder="课程ID（例：web）"  disabled>
          <textarea input type="text" class="form-control" rows="2" name="editcourseinfo" placeholder="课程介绍" required><?php echo $info?></textarea>
          <textarea input type="text" class="form-control" rows="5" name="editcoursedemand" placeholder="课程要求" required><?php echo $demand?></textarea>
          <button class="btn btn-lg btn-success btn-block" input type="submit">修改</button>
          </form>
          </div>
        </div>

        </div>
      <?php include('./partial/footer.php') ?>
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
