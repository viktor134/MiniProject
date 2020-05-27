<?php


include '../config_db.php';
$user_id=$_POST['user_id'];
$text=$_POST['text'];



$sql="INSERT INTO comment (text,user_id)
values (?,?)";
$statement=$pdo->prepare($sql);
$statement->execute([
    $_POST['text'],
    $_POST['user_id'],

]);


var_dump($statement);






