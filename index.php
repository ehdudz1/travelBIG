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

    <!-- 메인 회전목마 -->
    <?php
    if(empty($_GET['id']) !== false){

      echo '<div id="myCarousel" class="carousel slide" data-ride="carousel">';

      echo '<ol class="carousel-indicators">';
      echo '<li data-target="#myCarousel" data-slide-to="0" class="active"></li>';
      echo '<li data-target="#myCarousel" data-slide-to="1"></li>';
      echo '<li data-target="#myCarousel" data-slide-to="2"></li>';
      echo '<li data-target="#myCarousel" data-slide-to="3"></li>';
      echo '<li data-target="#myCarousel" data-slide-to="4"></li>';
      echo '</ol>';

      echo '<div class="carousel-inner" role="listbox">';
      echo '<div class="item active">';
      echo '<img src="/img/3.jpg" alt="Chania">';
      echo '</div>';
      echo '<div class="item">';
      echo '<img src="/img/4.jpg" alt="Chania">';
      echo '</div>';
      echo '<div class="item">';
      echo '<img src="/img/5.jpg" alt="Flower">';
      echo '</div>';
      echo '<div class="item">';
      echo '<img src="/img/6.jpg" alt="Flower">';
      echo '</div>';
      echo '<div class="item">';
      echo '<img src="/img/7.jpg" alt="Flower">';
      echo '</div></div>';

      echo '<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">';
      echo '<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>';
      echo '<span class="sr-only">Previous</span>';
      echo '</a>';
      echo '<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">';
      echo '<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>';
      echo '<span class="sr-only">Next</span>';
      echo '</a>';
      echo '</div>';

    }
    ?>

<!-- 본문 -->
  <article>
  <?php
  if(empty($_GET['id']) === false){
    $a = $_GET['id'];
    $sql = "SELECT * FROM "."$a";
    $result  = mysqli_query($conn,$sql);
    echo $_GET['id']." 게시판";
  echo '<div class="row">';
  echo '<div class="col-md-3"></div>';
  echo '<table class="table table-striped col-md-6">';
  echo "<tbody>";
  echo "<th>글번호</th><th>제목</th><th>내용</th><th>작성자</th><th>작성시간</th>";
  echo "</tbody>";
    while ($row = mysqli_fetch_assoc($result)) {
    echo "<tbody>";
    echo "<tr class='tb'>";
    echo '<th>'.$row['id'].'</th>';
    echo '<th>'.'<a href="#">'.$row['title'].'</a>'.'</th>';
    echo '<th>'.'<a href="#">'.$row['descript'].'</a>'.'</th>';
    echo '<th>'.$row['author'].'</th>';
    echo '<th>'.$row['write'].'</th>';
    echo "</tr>";
    echo "</tbody>";
  }

  echo '</table>';
  echo '<a class="btn btn-default" href="/write.php?id='.$_GET['id'].'">글쓰기</a>';
  echo '<div class="col-md-3"></div>';
  echo '</div>';
}
  ?>
  </article>
  <!-- 본문끝 -->


    <!-- 하단 목록바 -->
    <footer>
    <?php
    if(empty($_GET['id']) === false){
      echo '<div class="row">';
      echo '<div class="col-md-3"></div>';
      echo '<nav class="col-md-6 footlist">';
      echo '<ul class="pagination">';
      echo '<li><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
      echo '<li><a href="#">1</a></li>';
      echo '<li><a href="#">2</a></li>';
      echo '<li><a href="#">3</a></li>';
      echo '<li><a href="#">4</a></li>';
      echo '<li><a href="#">5</a></li>';
      echo '<li><a href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li></ul>';
      echo '</nav>';
      echo '<div class="col-md-3"></div>';
      echo '</div>';
    }
     ?>
    </footer>
    <!-- 하단목록바 끝 -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <!-- 모든 컴파일된 플러그인을 포함합니다 (아래), 원하지 않는다면 필요한 각각의 파일을 포함하세요 -->
    <script src="/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
  </body>
</html>
