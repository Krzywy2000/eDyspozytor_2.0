<?php
    session_start();

    $login = $_POST['login'];
    $password = $_POST['password'];

    include("functions.php");

    $connect = dbconnect();

    $checkData = $connect->prepare("SELECT * from `users` WHERE `login` = :login and `password` = :password");
    $checkData->bindValue(':login', $login, PDO::PARAM_STR);
    $checkData->bindValue(':password', $password, PDO::PARAM_STR);
    $checkData->execute();

    $user = $checkData->fetch();

    if($checkData->rowCount() > 0)
    {
        $_SESSION['logged'] = true;
        $_SESSION['name'] = $user['name'];
        $_SESSION['surname'] = $user['surname'];

        header('Location: ../../panel.php');
        exit();
    }
    else
    {
        header('Location: ../../index.php?page=login');
        exit();
    }
?>