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


    <header>
      <div class="container">
        <div class="jumbotron">

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

       </ul>
       </nav>
    <!-- 게시판 끝 -->

      <hr>



      <article>

    				 <form id="write" action="/process.php?id=write" method="post">
               <br><h4>글쓰기</h4><br>
              <div class="form-group">
              <label for="form-board">게시판 선택</label>

              <?php

              // echo '<option value="free" >자유게시판</option>';
              // echo '<option value="free" selected>asdf</option>';
              // echo '<option value="free" >자aadsf유게시판</option>';
              echo '<select class="form-control" name="board" id="form-board">';

                switch($_GET['id']){
                  case 'free':
                    echo '<option value="free" selected>자유게시판</option>';
                    echo '<option value="dome">국내</option>';
                    echo '<option value="over">해외</option>';
                    echo '<option value="qna">Q&A</option>';
                    echo '<option value="event">이벤트공지</option>';
                    echo '<option value="market">중고나라</option>';
                  break;
                  case 'dome':
                    echo '<option value="free">자유게시판</option>';
                    echo '<option value="dome" selected>국내</option>';
                    echo '<option value="over">해외</option>';
                    echo '<option value="qna">Q&A</option>';
                    echo '<option value="event">이벤트공지</option>';
                    echo '<option value="market">중고나라</option>';
                  break;
                  case 'over':
                    echo '<option value="free">자유게시판</option>';
                    echo '<option value="dome">국내</option>';
                    echo '<option value="over" selected>해외</option>';
                    echo '<option value="qna">Q&A</option>';
                    echo '<option value="event">이벤트공지</option>';
                    echo '<option value="market">중고나라</option>';
                  break;
                  case 'qna':
                    echo '<option value="free">자유게시판</option>';
                    echo '<option value="dome">국내</option>';
                    echo '<option value="over">해외</option>';
                    echo '<option value="qna" selected>Q&A</option>';
                    echo '<option value="event">이벤트공지</option>';
                    echo '<option value="market">중고나라</option>';
                  break;
                  case 'event':
                    echo '<option value="free">자유게시판</option>';
                    echo '<option value="dome">국내</option>';
                    echo '<option value="over">해외</option>';
                    echo '<option value="qna">Q&A</option>';
                    echo '<option value="event" selected>이벤트공지</option>';
                    echo '<option value="market">중고나라</option>';
                  break;
                  case 'market':
                    echo '<option value="free">자유게시판</option>';
                    echo '<option value="dome">국내</option>';
                    echo '<option value="over">해외</option>';
                    echo '<option value="qna">Q&A</option>';
                    echo '<option value="event">이벤트공지</option>';
                    echo '<option value="market" selected>중고나라</option>';
                  break;
                }


                 echo '</select>';
               ?>
                 <!-- <option value="free">자유게시판</option>
                 <option value="dome">국내</option>
                 <option value="over">해외</option>
                 <option value="qna">Q&A</option>
                 <option value="event">이벤트공지</option>
                 <option value="market">중고나라</option> -->
             </div>

    					 <div class="form-group">
    						 <label for="form-title">제목</label>
    						 <input type="text" class="form-control" name="title" id="form-title" placeholder="제목을 적어주세요.">
    					 </div>

    					 <div class="form-group">
    						 <label for="form-author">작성자</label>
                 <?php
                 echo '<input type="text" class="form-control"  id="form-author" disabled value="'.$_SESSION['user_name'].'('.$_SESSION['user_id'].')'.'">';
                 echo '<input type="hidden" name="author" value="'.$_SESSION['user_name'].'('.$_SESSION['user_id'].')'.'">';
                  ?>
    					 </div>

    					 <div class="form-group">
    						 <label for="form-descirpt">내용</label>
    						 <textarea class="form-control" rows="10" name="descript"  id="form-descript" placeholder="내용을 적어주세요."></textarea>
    					 </div>

    					    <input type="submit" name="name" id="writebtn" class="btn btn-default  btn-sm " value="글쓰기" onclick="checknull()">

    				 </form>


             <script>

              function checknull() {

                var title = $('#form-title').val();
                var author = $('#form-author').val();
                var descript = $('#form-descript').val();
               //  alert(title);
               //  alert(author);
               //  alert(descript);

                if(title === "") {

                  alert('제목의 빈 칸을 채워주세요.');
                  title.focus();
                  return false;
                }
              }

             </script>


		    </article>

    <footer>



    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <!-- 모든 컴파일된 플러그인을 포함합니다 (아래), 원하지 않는다면 필요한 각각의 파일을 포함하세요 -->
    <script src="/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>

  </body>
</html>
