<?php

require_once '../config_db.php';

$id=$_GET['id'];
$sql="SELECT * FROM users where id=?";
$statement=$pdo->prepare($sql);
$statement->bindValue(1,$id);
$statement->execute();
$avatar=$statement->fetch(PDO::FETCH_ASSOC);

if(is_file('/uploads/' . $avatar['avatar']))  //провераем если есть файл в папке uploads удалаем а потом выполнаяем sql запрос
{
    unlink('/uploads/' . $avatar['avatar']);
}

$sql='Delete from users WHERE id=?';
$statement=$pdo->prepare($sql);
$statement->bindValue(1,$id);
$statement->execute();


header('Location:../index.php');