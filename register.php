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
<form action="/auth_component/reg_users.php" enctype="multipart/form-data" method="post">
    <div class="form-group">
        <label for="exampleFormControlInput1">Email address</label>
        <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email" required>
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Name</label>
        <input type="name" class="form-control" id="name" placeholder="name"  name="name" required >
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Repeat Password</label>
        <input type="password" class="form-control" id="repeat" name="repeat" required>
    </div>

    <div class="form-group">
        <label for="exampleFormControlFile1">Example file input</label>
        <input type="file" class="form-control-file" id="avatar" name="avatar">
    </div>

    <div class="form-group">
        <label>ROLE</label>
        <br>
      <select name="user_role" required>
          <option value="admin">Admin</option>
          <option value="users">Users</option>
      </select>
    </div>


    <div>
        <button class="btn btn-success" type="submit">Register</button>
    </div>
</form>



