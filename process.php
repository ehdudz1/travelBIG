<?php
require("/etc/db.php");
require("/etc/config.php");
$conn = db_init($config["host"],$config["duser"],$config["dpw"],$config["dname"]);

switch($_GET['id']){
    case 'write':
      $sql = "INSERT INTO ".$config["dname"].'.'.$_POST['board']."(`id`,`title`,`descript`,`author`,`write`) VALUES("."NULL".", '".$_POST['title']."', '".$_POST['descript']."', '".$_POST['author']."', NOW())";
      $result = mysqli_query($conn, $sql);
        //header("Location: http://localhost/index.php?id=".$_POST['board']);
        echo "<meta http-equiv='refresh' content='0;url=/index.php?id=".$_POST['board']."'>";
        break;
    case 'signup':
      $sql = "INSERT INTO ".$config["dname"]."."."user_inpo(`email`, `user_id`, `user_pw`, `name`, `bday`)"." VALUES('".$_POST['Email']."','".$_POST['Id']."','".$_POST['PW1']."','".$_POST['Name']."',".$_POST['Bday'].")";

      $result = mysqli_query($conn, $sql);

        //header("Location: http://localhost/signCG.php");
         session_start();
           $_SESSION['user'] = $_POST['Id'];
         echo "<meta http-equiv='refresh' content='0;url=/signCG.php>";
        break;
    case 'del':
      $sql = "DELETE FROM ".$_GET['board']." WHERE id = ".$_GET['number'];
      $result = mysqli_query($conn, $sql);
        // header("Location: http://localhost/index.php?id=".$_GET['board']);
          echo "<meta http-equiv='refresh' content='0;url=/index.php?id=".$_GET['board']."'>";
        break;
    case 'login':
      $sql = "SELECT * FROM user_inpo WHERE user_id = '".$_POST['user_id']."' AND user_pw = '".$_POST['user_pw']."'";
      // echo $sql;
      // echo "<br>";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
      // echo $_POST['user_pw']."</br>";
      // echo $_POST['user_id']."</br>";
      // var_dump($row);

      if ($row != NULL) {

        echo "<script>alert(' 로그인 되었습니다..');</script>";

        session_start();
          $_SESSION['user_id'] = $_POST['user_id'];
          $_SESSION['user_name'] = $row['name'];
      }else{
        session_start();
          $_SESSION['user_id'] = $_POST['user_id'];
          $_SESSION['user_name'] = $row['name'];
          echo "<script>alert('아이디 또는 패스워드가 잘못되었습니다.');history.back();</script>";
      }
        echo "<meta http-equiv='refresh' content='0;url=/signCG.php'>";
      break;
}
//$sql = "INSERT INTO ".$config["dname"].'.'.$_POST['board']."(`id`,`title`,`descript`,`author`,`write`) VALUES("."NULL".", '".$_POST['title']."', '".$_POST['descript']."', '".$_POST['author']."', NOW())";
//$sql = "INSERT INTO ".$config["dname"]."."."user_inpo(`email`, `user_id`, `user_pw`, `name`, `bday`)"." VALUES('".$_POST['Email']."','".$_POST['Id']."','".$_POST['PW1']."','".$_POST['Name']."',".$_POST['Bday'].")";
//$result = mysqli_query($conn, $sql);

//INSERT INTO $config["dname"].user_inpo(`email`, `user_id`, `user_pw`, `name`, `bday`) VALUES('$_POST['Email']','$_POST['Id']','$_POST['PW1']','$_POST['Name']',$_POST['Bday'])
//print_r($result);
//print_r($sql);
//print_r($test);
//header('Location: http://localhost/index.php');

?>
