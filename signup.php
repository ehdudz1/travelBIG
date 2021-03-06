<?php
  require("/etc/db.php");
  require("/etc/config.php");
  $conn = db_init($config["host"],$config["duser"],$config["dpw"],$config["dname"]);
  $sql = "SELECT * FROM board";
	$result = mysqli_query($conn,$sql);
session_start();
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
      <a class="logo" href="/index.php"><img src="/img/logo.png" width="50" height="50"></a>
    </p>

    <!-- 우측상단 네비 -->
    <nav id="top">
      <ul class="nav nav-pills pull-right">
        <!-- <li><a href="/login.php ">로그인</a></li> -->
        <!-- <li><a href="#">마이페이지</a></li> -->

        <?php
        if($_SESSION['user_name'] != NULL){

        echo '<li><a href="#">"'.$_SESSION['user_name'].'"님</a></li>';
        echo "<li><a href='logout.php'>로그아웃</a></li>";
      }else {
        echo '<li><a href="/signup.php">회원가입</a></li>';
        echo '<li><a href="/login.php ">로그인</a></li>';
      }
         ?>
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
<form id="signup" action="/process.php?id=signup" method="post">
  <h4>회원가입</h4>
  <div class="form-group">
    <label for="InputId">아이디</label>
    <input type="text" class="form-control" name="Id" id="InputId" placeholder="아이디를 입력하세요">
  </div>
  <div class="form-group">
    <label for="InputPW1">암호</label>
    <input type="password" class="form-control" name="PW1" id="InputPW1" placeholder="암호">
  </div>
 <div class="form-group">
   <label for="InputEmail">이메일 주소</label>
   <input type="email" class="form-control" name="Email" id="InputEmail" placeholder="이메일을 입력하세요">
 </div>
 <div class="form-group">
   <label for="InputName">이름</label>
   <input type="text" class="form-control" name="Name" id="InputName" placeholder="이름을 입력하세요">
 </div>
 <div class="form-group">
   <label for="InputBday">생년월일</label>
   <input type="number" class="form-control" name="Bday" id="InputBday" placeholder="생년월일을 입력하세요">
 </div>

 <button type="submit" class="btn btn-default">회원가입</button>
</form>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <!-- 모든 컴파일된 플러그인을 포함합니다 (아래), 원하지 않는다면 필요한 각각의 파일을 포함하세요 -->
    <script src="/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
  </body>
</html>
