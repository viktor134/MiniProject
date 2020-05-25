<?php
require_once 'config_db.php';
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
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Document</title>

</head>
<body>
<form action="users_component/update.php" enctype="multipart/form-data" method="post">


    <div class="form-group">
        <label for="exampleFormControlInput1">Name</label>
        <input type="name" class="form-control" id="name" placeholder="name"  name="name" value="<?=$user->name?>"  >
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Password</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Repeat Password</label>
        <input type="password" class="form-control" id="repeat" name="repeat">
    </div>

    <div class="form-group">
        <label for="exampleFormControlFile1">Example file input</label>
        <input type="file" class="form-control-file" id="avatar" name="avatar">
    </div>

    <div>
        <img src="uploads/<?=$user->avatar?>" width="200px">
    </div>

    <input type="hidden" name="id" value="<?=$user->id?>">


<br>

    <div>
        <button class="btn btn-success" type="submit">Edits</button>
    </div>
</form>



