<?php

require_once 'config_db.php';

$sql="SELECT * FROM comment";
$statement=$pdo->prepare($sql);
$statement->execute();
$comments=$statement->fetchAll(PDO::FETCH_OBJ);

//получаем комментарии из таблицы