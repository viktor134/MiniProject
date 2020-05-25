<?php


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
<form action="/auth_component/auth.php"  method="post">
    <div class="form-group">
        <label for="exampleFormControlInput1">Email address</label>
        <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email">

    </div>



    <div class="form-group">
        <label for="exampleFormControlInput1">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>


    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>


    <div>
        <button class="btn btn-success" type="submit">Login</button>
    </div>
</form>




