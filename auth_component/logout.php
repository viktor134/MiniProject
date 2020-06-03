<?php
session_start();
session_destroy();
setcookie("email", "", time() - 466680,'/');
setcookie("password", "", time() - 466680,'/');
setcookie('name',$user->name,time() - 466680, '/');
setcookie('user_role',$user->user_role,time() - 466680, '/');
header('Location:../index.php');