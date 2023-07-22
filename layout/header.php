<?php
session_start();
?>
<div class="col">
    <nav class="navbar navbar-expand-md sticky-top navbar-dark">

        <a class="navbar-brand" href="./panel.php">eDyspozytor</a><small class="text-muted">Wersja:</small><small class="text-muted"><?php echo version(); ?></small>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link">
                        <?php
                        echo "Witaj, {$_SESSION['name']}!";
                        ?>
                    </a>
                </li>
                <?php
                if($_SESSION['permissions'][21] == '21') {
                    echo "<li class='nav-item d-md-none header-element'><a class='nav-link' href='panel.php?page=" . $_SESSION['permissionsLink'][21] . "'>
                    Tabor</a></li>";
                }
                if($_SESSION['permissions'][22] == '22') {
                    echo "<li class='nav-item d-md-none header-element'><a class='nav-link' href='panel.php?page=" . $_SESSION['permissionsLink'][21] . "'>
                    Warsztat</a></li>";
                }
                if($_SESSION['permissions'][23] == '23') {
                    echo "<li class='nav-item d-md-none header-element'><a class='nav-link' href='panel.php?page=" . $_SESSION['permissionsLink'][21] . "'>
                    Przydziały</a></li>";
                }
                if($_SESSION['permissions'][24] == '24') {
                    echo "<li class='nav-item d-md-none header-element'><a class='nav-link' href='panel.php?page=" . $_SESSION['permissionsLink'][21] . "'>
                    Rozkłady</a></li>";
                }
                if($_SESSION['permissions'][27] == '27') {
                    echo "<li class='nav-item d-md-none header-element'><a class='nav-link' href='panel.php?page=" . $_SESSION['permissionsLink'][21] . "'>
                    Relacje</a></li>";
                }
                if($_SESSION['permissions'][25] == '25') {
                    echo "<li class='nav-item d-md-none header-element'><a class='nav-link' href='panel.php?page=" . $_SESSION['permissionsLink'][21] . "'>
                    Komunikaty</a></li>";
                }
                if($_SESSION['permissions'][26] == '26') {
                    echo "<li class='nav-item d-md-none header-element'><a class='nav-link' href='panel.php?page=" . $_SESSION['permissionsLink'][21] . "'>
                    Notatki</a></li>";
                }
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="scripts/php/logout.php">Wyloguj</a>
                </li>
            </ul>
        </div>

    </nav>
</div>