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

    <!-- 로그인 -->
<!-- <form id="login" action="/process.php?id=login" method="post">
  <h4>로그인</h4>
  <div class="form-group">
    <label for="InputID">아이디</label>
    <input type="text" class="form-control" name="ID" id="InputID" placeholder="아이디">
  </div>
  <div class="form-group">
    <label for="InputPW">암호</label>
    <input type="password" class="form-control" name="PW" id="InputPW" placeholder="암호">
  </div>


 <button type="submit" class="btn btn-default">로그인</button>
</form> -->
  <form method='post' action='/process.php?id=login'>
      <table>
        <tr>
	<td>아이디</td>
	<td><input type='text' name='user_id' tabindex='1'/></td>
	<td rowspan='2'><input type='submit' tabindex='3' value='로그인' style='height:50px'/></td>
        </tr>
        <tr>
	<td>비밀번호</td>
	<td><input type='password' name='user_pw' tabindex='2'/></td>
        </tr>
      </table>
</form>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <!-- 모든 컴파일된 플러그인을 포함합니다 (아래), 원하지 않는다면 필요한 각각의 파일을 포함하세요 -->
    <script src="/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
  </body>
</html>
