<?php

require_once '../config_db.php';
session_start();

$email=$_POST['email'];
$password=md5($_POST['password']);



if(!isset($email) || !isset($password))
{
    $message='<label>All fields are required</label>';
}
else
{
    $sql="SELECT * FROM users where email=:email and password=:password";
    $statement=$pdo->prepare($sql);
    $statement->execute(
        [
            'email'=>$email,
            'password'=>$password
        ]
    );
    $count=$statement->rowCount();
    if($count>0)
    {
        $count=$statement->fetch(PDO::FETCH_ASSOC);
        $_SESSION['name']=[
            'name'=>$count['name']
        ];

        header('Location:../index.php');
    }
    elseif ($count->id==0)
    {
        echo "error user";
    }
}