<?php
    session_start();

    $login = $_POST['login'];
    $password = $_POST['password'];

    include("databaseFunctions.php");

    $connect = dbconnect();

    $checkData = $connect->prepare("SELECT * from `users` WHERE `login` = :login and `password` = :password");
    $checkData->bindValue(':login', $login, PDO::PARAM_STR);
    $checkData->bindValue(':password', $password, PDO::PARAM_STR);
    $checkData->execute();

    $user = $checkData->fetch();

    if($checkData->rowCount() == 1)
    {
        $_SESSION['logged'] = true;
        $_SESSION['name'] = $user['name'];
        $_SESSION['surname'] = $user['surname'];

        $id = $user['id'];

        $checkPermissions = $connect->prepare("SELECT `functions`.`id` as `id` FROM `versionPermissions`
        INNER JOIN `version` on `versionPermissions`.`idVersion` = `version`.`id`
        INNER JOIN `functions` on `versionPermissions`.`idFunctions` = `functions`.`id`
        INNER JOIN `users` on `version`.`id` = `users`.`idVersion`
        WHERE `users`.`id` = :id");
        $checkPermissions->bindValue(":id",$id,PDO::PARAM_STR);
        $checkPermissions->execute();

        $permissionID = array();
        $i = 1;

        while($checkPermissionsFinish = $checkPermissions->fetch())
        {
            $permissionID[$i] = $checkPermissionsFinish['id'];
            $i++;
        }

        $_SESSION['permissions'] = $permissionID;
        
        header('Location: ../../panel.php');
        exit();
    }
    if($checkData->rowCount() > 1)
    {
        $_SESSION['logged'] = true;
        $_SESSION['name'] = $user['name'];
        $_SESSION['surname'] = $user['surname'];

        header('Location: ../../chooseCity.php');
        exit();
    }
    else
    {
        header('Location: ../../index.php?page=login');
        exit();
    }
?>