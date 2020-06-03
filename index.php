<?php
session_start();
require 'config_db.php';
require 'users_component/get_users.php';
require 'users_component/get_comment.php';

//check cookie_id  for user table

$email = $_SESSION['email']['email'];
//var_dump($email);
$sql = "SELECT * FROM users where email=:email";
$statement = $pdo->prepare($sql);
$statement->execute([
    'email' => $email
]);
$user = $statement->fetch(PDO::FETCH_OBJ);

if ($user->cookie_id == null && isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
    $_SESSION['name']['name'] = $_COOKIE['name'];//данные кукии присвоеваем сессии
    $_SESSION['user_role']['user_role'] = $_COOKIE['user_role'];////данные кукии присвоеваем сессии


}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Document</title>
</head>
<body data-gr-c-s-loaded="true">
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">Viktor example Project</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>

        </ul>
        <form class="form-inline my-2 my-lg-0">
            <? if (isset($_SESSION['name'])) {
                echo $_SESSION['name']['name'];
                echo " ";
                echo 'Role:' . $_SESSION['user_role']['user_role'];
                echo "<a href='auth_component/logout.php' class='btn btn-outline-danger my-2 my-sm-0'>Logout</a>";
            } else {
                echo "<a href='register.php' class='btn btn-outline-success'>Register</a>";
                echo "<a href='auth.php' class='btn btn-outline-success my-2 my-sm-0'>Login</a>";

            }
            ?>

        </form>
    </div>
</nav>
<main role="main">
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">Hello, Test Project!</h1>
            <p>Thanks thank you my teacher <b>Рахим Муратов</b> without his motivation and support I would not have succeeded</p>
            <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more »</a></p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <? foreach ($users as $user): ?>


                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <? if ($user['avatar'] == null) : ?>  <!--если картинка null выводит no-image.jpg -->
                            <img src="/uploads/no-image.jpg" width="200px"/>
                        <? else: ?>
                            <img src="/uploads/<?= $user['avatar'] ?>" width="200px"/>

                        <? endif; ?>

                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p>
                        <p>Role:<?= $user['user_role'] ?></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="users_component/profile.php?id=<?= $user['id'] ?>"
                                <button type="button" class="btn btn-sm btn-outline-secondary">View Profile</button>
                                </a>
                                <a href="edit.php?id=<?= $user['id'] ?>"
                                <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                </a>
                                <a href="users_component/delete.php?id=<?= $user['id'] ?>"
                                <button type="button" class="btn btn-sm btn-outline-secondary">Delete</button>
                                </a>
                            </div>
                            <small class="text-muted">9 mins</small>
                        </div>
                    </div>
                </div>

            <? endforeach; ?>
        </div>
    </div>
    <p style="color: blueviolet">Comments</p>
    <? foreach ($comments as $comment): ?>
        <p><?= $comment->text ?></p>
        <p>ID USER <?= $comment->user_id ?></p>
    <? endforeach; ?>

    </form>
    </div>
    </div>
    </div>
</main>

<? if (isset($_SESSION['name'])): ?>

    <form action="users_component/comment.php" method="post">
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Comments</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="text"></textarea>
        </div>
        <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
        <button type="submit" class="btn btn-primary">send comment</button>
    </form>
<? else: ?>
    <footer class="container">
        <p>© Company 2017-2020</p>
    </footer>
<? endif; ?>
</body>
</html>
