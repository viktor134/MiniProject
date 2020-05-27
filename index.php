<?php
require 'config_db.php';
require 'users_component/get_users.php';
session_start();
echo $_COOKIE['email'];
echo "sdasada";
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
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">Dropdown</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <? if (isset($_SESSION['name'])) {
                echo $_SESSION['name']['name'];
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
            <h1 class="display-3">Hello, world!</h1>
            <p>This is a template for a simple marketing or informational website. It includes a large callout called a
                jumbotron and three supporting pieces of content. Use it as a starting point to create something more
                unique.</p>
            <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more »</a></p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <? foreach ($users as $user): ?>


                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                    <?if($user['avatar']==null) : ?>
                        <img src="/uploads/no-image.jpg" width="200px"/>
                   <?else:?>
                        <img src="/uploads/<?= $user['avatar'] ?>" width="200px"/>

                        <?endif;?>

                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p>
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

    <div class="form-group">
        <form action="users_component/comment.php" method="post">
            <label for="exampleFormControlTextarea1">Comments</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="text"></textarea>
            <input type="hidden" name="user_id" value="<?=$user['id'] ?>" >

    <button class="btn btn-success">comments</button>
    </form>
    </div>
    </div>
    </div>
</main>
<footer class="container">
    <p>© Company 2017-2020</p>
</footer>
</body>
</html>
