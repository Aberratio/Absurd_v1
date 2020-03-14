<?php
session_start();
include("get_training_groups.php");

if (!isset($_SESSION['is_logged'])) {
    header('Location: index.php');
    exit();
}

if ($_SESSION['role'] != 2) {
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
    <link rel="stylesheet" href="css/style.css">

    <script type="text/javascript" src="js/add_test.js">

    </script>
</head>

<body>

    <header>
        <nav class="navbar navbar-dark bg-absurd-col-light navbar-expand-md">
            <a class="navbar-brand" href="menu.php">
                <img src="img/logo.png" widht="30" height="30" class="d-inline-block mr-1 align-bottom" alt="">
                Absurd
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainmenu" aria-controls="mainmenu" aria-expanded="false" aria-label="Przełącznik nawigacji">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainmenu">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">
                            &nbsp;&nbsp;<img class='profile_picture' style='width:30px; height: 30px; border: 1px solid black; border-radius: 75%;' src='<?php echo $_SESSION['profile_picture']; ?>'>&nbsp;&nbsp;&nbsp;(<i><?php echo $_SESSION['user']; ?></i>) <b>Wyloguj<b></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>


    <main>
        <section>

            <div style="margin-top: 50px; width: 500px; margin: auto; font-size:24px;">

                <div>
                    <p style="font-size: 32px; color: rgb(247, 109, 109);  margin-top: 20px; margin-bottom: 20px; text-align:center;">Dodaj grupę</p>
                    <form method="get">
                        <input type="text" class="form-control" placeholder="Nazwa grupy" name="group_name" style="margin-bottom: 20px;" />
                        <input type="text" class="form-control" placeholder="Pierwszy gracz" name="first_player" style="margin-bottom: 20px;" />
                        <input type="text" class="form-control" placeholder="Drugi gracz" name="second_player" style="margin-bottom: 20px;" />
                        <p><button class='profile_view_button' name='add_group'>Dodaj grupę</button></p>
                        <?php
                        if (isset($_GET['add_group'])) {
                            $first = mysqli_fetch_array(mysqli_query($con, 'SELECT * FROM bridgeplayers WHERE user = "' . $_GET['first_player'] . '"'));
                            $second = mysqli_fetch_array(mysqli_query($con, 'SELECT * FROM bridgeplayers WHERE user = "' . $_GET['second_player'] . '"'));

                            mysqli_query($con, "INSERT INTO `training_groups`(`id_group`, `id_trainer`, `id_first_player`, `id_second_player`, `group_name`) 
                                                    VALUES (0," . $_SESSION['id'] . "," . $first['id'] . "," . $second['id'] . ",'" . $_GET['group_name'] . "')");
                            echo "Dodano grupę!";
                        }
                        ?>
                    </form>
                </div>

                <div style="margin-top: 50px;">
                    <p style="font-size: 32px; color: rgb(253, 197, 124); margin-top: 20px; margin-bottom: 20px; text-align:center;">Moje grupy treningowe</p>

                    <div id="group_table" style="margin: auto;">
                        <?php get_group_table(); ?>
                    </div>
                </div>
            </div>
        </section>


    </main>

    <footer>

    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>