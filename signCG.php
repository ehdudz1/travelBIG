<?php
  require("/db.php");
  require("/config.php");
  $conn = db_init($config["host"],$config["duser"],$config["dpw"],$config["dname"]);
  $sql = "SELECT * FROM board";
	$result = mysqli_query($conn,$sql);

 ?>

<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/bootstrap-3.3.4-dist/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
  </head>

  <body>
    <!-- 상단  -->
    <p>
      <a class="logo" href="/index.php"><img src="/img/logo.jpg" width="50" height="50"></a>
    </p>

    <nav id="top">
      <ul class="nav nav-pills pull-right">
        <li><a href="/signup.php">회원가입</a></li>
        <li><a href="#">로그인</a></li>
        <li><a href="#">마이페이지</a></li>
      </ul>
    </nav>

    <!-- 메인 상단 -->
    <header>
      <div class="container">
        <div class="jumbotron">

          <!-- <h1>메인 화면</h1> -->

        </div>
      </div>
    </header>

    <hr>

    <!-- 게시판 부분  -->
      <nav role="navigation" class="navbar navbar-inverse">

      <ul class="nav navbar-nav">
        <?php
    			while ($row = mysqli_fetch_assoc($result)) {
    					echo '<li><a href="/index.php?id='.$row['idtitle'].'">'.htmlspecialchars($row['title']).'</a></li>';
    				}
    		 ?>
       </nav>
    <!-- 게시판 끝 -->

    <hr>

    <!-- 회원가입 -->

  <h4>""님 회원가입을 축하합니다.!!!</h4>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <!-- 모든 컴파일된 플러그인을 포함합니다 (아래), 원하지 않는다면 필요한 각각의 파일을 포함하세요 -->
    <script src="/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
  </body>
</html>
