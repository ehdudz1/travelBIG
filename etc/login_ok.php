<?php
  require("/db.php");
  require("/config.php");
  $conn = db_init($config["host"],$config["duser"],$config["dpw"],$config["dname"]);
  $sql = "SELECT * FROM user_inpo WHERE user_id = '".$_POST['user_id']."' AND user_pw = '".$_POST['user_pw']."'";
  
echo $sql;
echo "<br>";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_assoc($result);


echo $_POST['user_id']."</br>";
echo $_POST['user_pw']."</br>";
var_dump($row);

if ($row != NULL) {

  echo "<script>alert(' 로그인 되었습니다..');</script>";

  session_start();
    $_SESSION['user_id'] = $_POST['user_id'];
    $_SESSION['user_name'] = $row['name'];
}else{
  echo "<script>alert('아이디 또는 패스워드가 잘못되었습니다.');</script>";
}


?>
<meta http-equiv='refresh' content='0;url=/signCG.php'>
