<?php
    session_start();
    if(@$_SESSION['logged'] == true)
    {
        header('Location: panel.php');
        exit;
    }
?>

<html lang="pl">
    <head>
        <title>eDyspozytor</title>

        <!--Scripts-->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="scripts/js/bootstrap.bundle.min.js"></script>
            <script src="https://use.fontawesome.com/68785a6878.js"></script>

        <!--Links-->
            <link rel="stylesheet" href="styles/main.css"/>
            <link rel="stylesheet" href="styles/bootstrap.min.css"/>

        <!--Meta tags-->
            <meta charset="utf-8">
            <meta name="description" content="">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta author="Wiktor Wiese, Paweł Żołnierzak">
            <meta name="keywords" content="">
    </head>

    <body>
        <div class="card login-card">
            <h4 class="card-header text-center">Panel eDyspozytor</h4>
            <div class="card-body">
                <h5 class="card-title text-center">Logowanie</h5>

                <form action="scripts/php/login.php" method="post">
                    <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                            </div>
                            <input class="form-control" type="text" name="login" placeholder="Login" required>
                    </div>

                    <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            </div>
                            <input class="form-control" type="password" name="password" placeholder="Hasło" required>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Zaloguj!</button>
                    </div>
                    <p class="text-center"><a href="#" class="btn">Zapomniałem hasło</a></p>
                </form>
            </div>
        </div>
    </body>
</html>
