<?php
    if(@$_SESSION['logged'] == true)
    {
        header('Location: panel.php');
        exit;
    }
?>
<section>
    <div class="container section-container">
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
    </div>
</section>