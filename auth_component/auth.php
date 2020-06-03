<?php


require_once '../config_db.php';
session_start();

$email = $_POST['email'];
$password = md5($_POST['password']);
$remember = ($_POST['remember']);


if (empty($email) || empty($password)) {
    echo '<label>All fields are required</label>';
} elseif (isset($email) || isset($password)) {
    $sql = "SELECT * FROM users where email=:email and password=:password";
    $statement = $pdo->prepare($sql);
    $statement->execute(
        [
            'email' => $email,
            'password' => $password
        ]
    );
    $count = $statement->rowCount();
    if ($count > 0) {

        $count = $statement->fetch(PDO::FETCH_ASSOC);
        $_SESSION['name'] = ['name' => $count['name']]; //даные с таблицы присваеваем сессии
        $_SESSION['user_role'] = ['user_role' => $count['user_role']];//даные с таблицы присваеваем сессии
        $_SESSION['email'] = ['email' => $count['email']];//даные с таблицы присваеваем сессии
        header('Location:../index.php');//даные с таблицы присваеваем сессии

        if ($remember == 'on') {  //если пользователь нажал кнопку сохранить меня генерируем уникалное значение
            // и отправлаем в cookie_id  и сохраняем в cookie


            $identifier = uniqid();
            //var_dump($identifier);


            $sql = 'UPDATE users SET cookie_id=?  Where email=?';
            $statement = $pdo->prepare($sql);
            $statement->bindValue(1, $identifier);
            $statement->bindValue(2, $email);
            $statement->execute();


            setcookie('email', $_POST['email'], time() + 60 + 60 * 7777, '/');
            setcookie('password', $_POST['password'], time() + 60 + 60 * 7777, '/');

            $sql = 'SELECT * FROM  users Where email=:email';  //ПОЛУЧАЕМ ДАННЫЕ ИЗ БД ЧТОБ ПЕРЕДАТЬ COOKIE(name,user_role)
            $statement = $pdo->prepare($sql);
            $statement->execute(['email'=>$email]);
            $user=$statement->fetch(PDO::FETCH_OBJ);

            setcookie('name',$user->name,time() + 60 + 60 * 7777, '/');
            setcookie('user_role',$user->user_role,time() + 60 + 60 * 7777, '/');

            header('Location:../index.php');
        } else {     //если пользователь не нажал на кнопку сохранить меня посилаем значени null cookie_id

            $value = null;
            $sql = 'UPDATE users SET cookie_id=?  Where email=?';
            $statement = $pdo->prepare($sql);
            $statement->bindValue(1, $value);
            $statement->bindValue(2, $email);
            $statement->execute();
            header('Location:../index.php');
        }


    } elseif ($count->id == 0) {
        echo "error user";
    }


}
