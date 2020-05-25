<?php
require_once '../config_db.php';
$id=$_GET['id'];
$sql="SELECT * FROM users WHERE id=?";
$statement=$pdo->prepare($sql);
$statement->bindValue(1,$id);
$statement->execute();
$user=$statement->fetch(PDO::FETCH_OBJ);


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
<!-- Image and text -->
<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <img src="/uploads/<?=$user->avatar?>" width="300" height="300" class="d-inline-block align-top" alt="" loading="lazy">
       <?=$user->name?>
</nav>
</body>
</html>