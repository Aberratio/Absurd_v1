<?php
session_start();

if ((isset($_SESSION['is_logged'])) && ($_SESSION['is_logged'] == true)) {
    header('Location: menu.php');
    exit();
}
?>

<!DOCTYPE HTML>
<html lang="pl">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatile" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>Absurd - platforma licytacyjna</title>
    <meta name="description" content="Strona do nauki gry w brydża">
    <meta name="keywords" content="brydż, licytacja, rozgrywka, bridge, absurd">
    <meta name="author" content="Joanna Kokot">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style2.css">
</head>

<body>
    <main>

        <!--  Okno logowania -->
        <div class="login-container d-flex align-items-center justify-content-center">
            <form class="login-form text-center" action="login.php" method="post">
                <h1 class="mb-5 font-weight-light text-uppercase">Logowanie</h1>
                <div class="form-group">
                    <input type="text" class="form-control rounded-pill form-control-lg" name="login" placeholder="Login" autocomplete="off" required="required">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control rounded-pill form-control-lg" name="password" placeholder="Hasło" autocomplete="off" required="required">
                </div>
                <div class="forgot-link d-flex align-items-center justify-content-between ">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="remember">
                        <label for="remember">Zapamiętaj</label>
                    </div>
                    <div class="small">
                        <a href="forgot_pass.php">Zapomniałeś hasła?</a>
                    </div>
                </div>
                <button type="submit" class="btn mt-5 btn-custom btn-block rounded-pill btn-lg bg-absurd-col-dark">Zaloguj</button>
                <?php
                if (isset($_SESSION['error_login'])) {
                    echo $_SESSION['error_login'];
                }
                ?>
                <p class="mt-3 font-weight-normal">Nie masz konta?
                    <a href="registration.php"><strong>Zarejestruj teraz</strong></a>
                </p>
            </form>

        </div>
        <!--  .......... Okno logowania -->

    </main>

    <footer>

    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>