<?php

include '../config_db.php';
$id=$_POST['id'];
$comment=$_POST['title'];
//var_dump($id,$comment);
$sql="INSERT INTO comment  (title,user_id) values (:title,:user_id)";
$statement=$pdo->prepare($sql);
$statement->bindValue(':title',$comment);
$statement->bindValue(':user_id',$id);
$statement->execute();


//var_dump($statement);




