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
        $_SESSION['companyID'] = $user['idCompany'];

        $id = $user['id'];

        $checkPermissions = $connect->prepare("SELECT `functions`.`id` as `id`,`functions`.`nameFile` as `nameFile` FROM `versionPermissions`
        INNER JOIN `version` on `versionPermissions`.`idVersion` = `version`.`id`
        INNER JOIN `functions` on `versionPermissions`.`idFunctions` = `functions`.`id`
        INNER JOIN `users` on `version`.`id` = `users`.`idVersion`
        WHERE `users`.`id` = :id");
        $checkPermissions->bindValue(":id",$id,PDO::PARAM_STR);
        $checkPermissions->execute();

        $permissionID = array();
        $permissionLink = array();

        while($checkPermissionsFinish = $checkPermissions->fetch())
        {
            $i = $checkPermissionsFinish['id'];
            $permissionID[$i] = $checkPermissionsFinish['id'];
            $permissionLink[$i] = $checkPermissionsFinish['nameFile'];
        }

        $_SESSION['permissions'] = $permissionID;
        $_SESSION['permissionsLink'] = $permissionLink;
        
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
