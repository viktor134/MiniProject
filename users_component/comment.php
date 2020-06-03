<?php

require_once "../config_db.php";

$text=$_POST['text'];
$user_id=$_POST["user_id"];

//var_dump($text,$user_id);

$sql="INSERT INTO comment(text,user_id) VALUES (?,?)";
$statement=$pdo->prepare($sql);
$res=$statement->execute([
  $text,$user_id

]);

header('Location:../index.php');
//var_dump($res);
