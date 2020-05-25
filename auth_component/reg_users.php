<?php
include "../config_db.php";
$email = $_POST['email'];
$name = $_POST['name'];
$password = $_POST['password'];
$repeat_password = $_POST['repeat'];
//var_dump($email,$name);
if ($password == $repeat_password) {
    $password = md5($password);
} else
    return;


if (is_uploaded_file($_FILES['avatar']['tmp_name'])) {
    $avatar = $_FILES['avatar']['name'];
    move_uploaded_file($_FILES['avatar']['tmp_name'], '../uploads/' . $avatar);
} elseif (empty(is_uploaded_file($_FILES['avatar']['tmp_name']))) {
    $avatar = "http://placehold.it/350x50";

    $user_role = $_POST['user_role'];
}

    $sql = "INSERT INTO users(email,name,password,avatar,user_role) 
values (:email,:name,:password,:avatar,:user_role)";
    $statement = $pdo->prepare($sql);
    $statement->execute([
            "email" => $email,
            "name" => $name,
            "password" => $password,
            "avatar" => $avatar,
            "user_role" => $user_role,
        ]
    );


    header("Location:../index.php");


    ?>