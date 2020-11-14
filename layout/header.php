<header>
    <nav class="navbar navbar-expand-md sticky-top navbar-dark">

        <a class="navbar-brand">eDyspozytor</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link">
                        <?php
                            echo "Witaj, {$_SESSION['name']} {$_SESSION['surname']}!";
                        ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="scripts/php/logout.php">Wyloguj</a>
                </li>
            </ul>
        </div>

    </nav>
</header>