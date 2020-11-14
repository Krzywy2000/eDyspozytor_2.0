<?php
    session_start();
    if(@$_SESSION['logged'] != true)
    {
        header('Location: index.php');
        exit;
    }
?>

<html lang="pl">
    <head>
        <title>eDyspozytor - Panel</title>

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
        <?php
            include("layout/header.php");
        ?>
        <div class="row">
            <?php
                include("layout/sidebar.php");
            ?>
            <div class="col">
                <?php
                    $toInclude = isset($_GET['page']) ? $_GET['page'] : "main";
                    include("pages/{$toInclude}.php");
                ?>
            </div>
        </div>
        <?php
            include("layout/footer.php");
        ?>
    </body>
</html>
