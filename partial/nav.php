<nav class="navbar navbar-default" style="opacity: 0.8">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a class="navbar-brand"><b>AreaLoad</b></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse navbar-right">
            <ul class="nav navbar-nav">
            <?php
            if (basename($_SERVER['PHP_SELF']) == 'admin.php')
            {
                $connect = new PDO('sqlite:./db/db.sqlite');
                $counts = $connect->query("SELECT COUNT(*) FROM problem;");
                $count = $counts->fetchColumn();
                if($count == 0)
                echo "<li class=\"tickets\"><a>Tickets <span class=\"badge\" style=\"background:rgb(0,176,240);border-radius:200px\">" . $count . "</span></a></li>";
                else
                {
                echo "<li class=\"tickets\"><a>Tickets <span class=\"badge\" style=\"background:red\">" . $count . "</span></a></li>";
                }
            }
            ?>
              <li <?php if (basename($_SERVER['PHP_SELF']) == 'index.php') echo 'class="active"'?>><a href="./index.php">首页</a></li>
                <?php
                if (basename($_SERVER['PHP_SELF']) != 'admin.php' && basename($_SERVER['PHP_SELF']) == 'problem.php')
                {
                    echo "<li class=\"active\"><a href=\"./problem.php\">申请重新上传</a></li>";
                }
                elseif (basename($_SERVER['PHP_SELF']) == 'request.php' || basename($_SERVER['PHP_SELF']) == 'admin.php' || basename($_SERVER['PHP_SELF']) == 'edit.php')
                {
                    //Display Nothing
                }
                else
                    echo "<li><a href=\"./problem.php\">申请重新上传</a></li>";
              ?>
              <li <?php if (basename($_SERVER['PHP_SELF']) == 'admin.php' && basename($_SERVER['PHP_SELF']) != 'request.php') echo 'class="active"'?>><a href="./admin.php">管理面板</a></li>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</nav>
