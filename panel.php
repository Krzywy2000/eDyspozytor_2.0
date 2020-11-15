<?php
    session_start();
    if(@$_SESSION['logged'] != true)
    {
        header('Location: index.php');
        exit;
    }

    include("scripts/php/functions.php");
?>

<html lang="pl">
    <head>
        <title>eDyspozytor - Panel</title>

        <!--Scripts-->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="scripts/js/bootstrap.bundle.min.js"></script>
            <script src="https://use.fontawesome.com/68785a6878.js"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/1.0.0/mdb.min.js"></script>

        <!--Links-->
            <link rel="stylesheet" href="styles/main.css"/>
            <link rel="stylesheet" href="styles/bootstrap.min.css"/>
            <link href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" rel="stylesheet"/>
            <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/1.0.0/mdb.min.css" rel="stylesheet"/>

        <!--Meta tags-->
            <meta charset="utf-8">
            <meta name="description" content="">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta author="Wiktor Wiese, Paweł Żołnierzak">
            <meta name="keywords" content="">
    </head>

    <body>
        <div class="body-container">
            <div class="row">
                <?php
                    include("layout/header.php");
                ?>
            </div>
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
            <div class="row">
                <?php
                    include("layout/footer.php");
                ?>
            </div>
        </div>
    </body>
</html>
