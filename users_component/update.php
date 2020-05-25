<?php


include "../config_db.php";

$id=$_POST['id'];
$name = $_POST['name'];
$password = $_POST['password'];
$repeat_password = $_POST['repeat'];

if(!empty($_POST['name']))
{
    $sql="UPDATE users SET name=? WHERE id=?";
    $statement=$pdo->prepare($sql);
    $statement->bindValue(1,$name);
    $statement->bindValue(2,$id);
    $statement->execute();
}


if(!empty($_POST['password'] and  $_POST['repeat']))
{
    if ($password == $repeat_password) {
        $password = md5($password);
    }
    $sql="UPDATE users SET password=? WHERE id=?";
    $statement=$pdo->prepare($sql);
    $statement->bindValue(1,$password);
    $statement->bindValue(2,$id);
    $statement->execute();

}




// edit and upload image
if (is_uploaded_file($_FILES['avatar']['tmp_name'])) {
    $avatar = $_FILES['avatar']['name'];

    $sql="SELECT * FROM users where id=?";
    $statement=$pdo->prepare($sql);
    $statement->bindValue(1,$id);
    $statement->execute();
    $avatars=$statement->fetch(PDO::FETCH_ASSOC);

    if(is_file('../uploads/' .$avatars['avatar'])){
        unlink('../uploads/' . $avatars['avatar']);
    }

    move_uploaded_file($_FILES['avatar']['tmp_name'], '../uploads/' . $avatar);

    $sql="UPDATE users SET avatar=? where id=?";
    $statement=$pdo->prepare($sql);
    $statement->bindValue(1,$avatar);
    $statement->bindValue(2,$id);
    $statement->execute();

} elseif (empty(is_uploaded_file($_FILES['avatar']['tmp_name']))) {
    $avatar = "http://placehold.it/350x50";


}



header("Location:../index.php");


