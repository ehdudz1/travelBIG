
<?php
$config = array(
'host' =>"localhost" ,
'duser' => 'root',
'dpw' => 'qaz1wsx21',
'dname' => 'travel'
);
function db_init($host,$duser,$dpw,$dname){
$conn = mysqli_connect($host,$duser,$dpw);
mysqli_select_db($conn,$dname);
return $conn;
}
$conn = db_init($config["host"],$config["duser"],$config["dpw"],$config["dname"]);
// $sql = "SELECT * FROM board WHERE idtitle='".$_POST['idtitle']."'";
// $result = mysqli_query($conn,$sql);
//
// if($result -> num_rows == 0){
//   $sql = "INSERT INTO user(name,password) VALUES('".$_POST['author']."','111111')";
//   mysqli_query($conn,$sql);
//   $user_id = mysqli_insert_id($conn);
//
// }else{
//
//   $row = mysqli_fetch_assoc($result);
//   $user_id = $row['id'];
// }
//INSERT INTO `travel`.`dome` (`id`, `title`, `descript`, `author`, `write`) VALUES (NULL, '123', '123', '231231', NOW())
$sql = "INSERT INTO ".$config["dname"].'.'.$_POST['board']."(`id`,`title`,`descript`,`author`,`write`) VALUES("."NULL".", '".$_POST['title']."', '".$_POST['descript']."', '".$_POST['author']."', NOW())";
$result = mysqli_query($conn, $sql);
//print_r($result);
//print_r($sql);
header('Location: http://localhost/index.php');
?>
