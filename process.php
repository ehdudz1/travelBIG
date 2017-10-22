<?php
require("/db.php");
require("/config.php");
$conn = db_init($config["host"],$config["duser"],$config["dpw"],$config["dname"]);

switch($_GET['id']){
    case 'write':
      $sql = "INSERT INTO ".$config["dname"].'.'.$_POST['board']."(`id`,`title`,`descript`,`author`,`write`) VALUES("."NULL".", '".$_POST['title']."', '".$_POST['descript']."', '".$_POST['author']."', NOW())";
      $result = mysqli_query($conn, $sql);
        header("Location: http://localhost/index.php?id=".$_POST['board']);
        break;
    case 'signup':
      $sql = "INSERT INTO ".$config["dname"]."."."user_inpo(`email`, `user_id`, `user_pw`, `name`, `bday`)"." VALUES('".$_POST['Email']."','".$_POST['Id']."','".$_POST['PW1']."','".$_POST['Name']."',".$_POST['Bday'].")";
      $result = mysqli_query($conn, $sql);
        header("Location: http://localhost/index.php");
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
