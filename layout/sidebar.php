<div class="d-none d-md-block col-md-2 col-xl-1 sidebar">
    <div class="row">
        <?php

        if ($_SESSION['permissions'][21] == '21') {
            echo '<div class="col-12 sidebar-block">
                <a href="panel.php?page=' . $_SESSION['permissionsLink'][21] . '">
                <H4><i class="fas fa-bus sidebar-icons"></i></H4>
                <p>Tabor</p>
                </a>
                </div>';
        }

        if ($_SESSION['permissions'][22] == '22') {
            echo '<div class="col-12 sidebar-block">
                <a href="#">
                <H4><i class="fas fa-tools sidebar-icons"></i></H4>
                <p>Warsztat</p>
                </a>
                </div>';
        }

        if ($_SESSION['permissions'][23] == '23') {
            echo '<div class="col-12 sidebar-block">
                <a href="#">
                <H4><i class="fas fa-sitemap sidebar-icons"></i></H4>
                <p>Przydziały</p>
                </a>
                </div>';
        }

        if ($_SESSION['permissions'][24] == '24') {
            echo '<div class="col-12 sidebar-block">
                <a href="#">
                <H4><i class="fas fa-calendar sidebar-icons"></i></H4>
                <p>Rozkłady</p>
                </a>
                </div>';
        }

        if ($_SESSION['permissions'][27] == '27') {
            echo '<div class="col-12 sidebar-block">
                <a href="#">
                <H4><i class="fas fa-route sidebar-icons"></i></H4>
                <p>Relacje</p>
                </a>
                </div>';
        }

        if ($_SESSION['permissions'][25] == '25') {
            echo '<div class="col-12 sidebar-block">
                <a href="#">
                <H4><i class="fas fa-clipboard sidebar-icons"></i></H4>
                <p>Komunikaty</p>
                </a>
                </div>';
        }

        if ($_SESSION['permissions'][26] == '26') {
            echo '<div class="col-12 sidebar-block">
                <a href="#">
                <H4><i class="fas fa-sticky-note sidebar-icons"></i></H4>
                <p>Notatki</p>
                </a>
                </div>';
        }
        ?>
        <div class="col-12 sidebar-footer">
            <p><b>Copyright</b>&copy<br>2020</p>
            <a>Wiktor Wiese</a><br><a>&</a><br><a>Paweł Żołnierzak</a>
        </div>
    </div>
</div>