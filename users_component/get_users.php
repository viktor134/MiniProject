<?php

require 'config_db.php';

$sql='SELECT * FROM users';
$statement=$pdo->prepare($sql);
$statement->execute();
$users=$statement->fetchAll(PDO::FETCH_ASSOC);

//получаем пользователей