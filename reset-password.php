<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

require_once "config.php";


$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if (empty(trim($_POST["new_password"]))) {
        $new_password_err = "Introdu parola noua.";
    } elseif (strlen(trim($_POST["new_password"])) < 6) {
        $new_password_err = "Parola trebuie sa aiba cel putin 6 caractere.";
    } else {
        $new_password = trim($_POST["new_password"]);
    }

    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Confirma parola.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($new_password_err) && ($new_password != $confirm_password)) {
            $confirm_password_err = "Parolele nu se potrivesc.";
        }
    }

    if (empty($new_password_err) && empty($confirm_password_err)) {
        $sql = "UPDATE users SET password = ? WHERE id = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);

            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];

            if (mysqli_stmt_execute($stmt)) {
                session_destroy();
                header("location: login.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            mysqli_stmt_close($stmt);
        }
    }

    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Media Digitala</title>
    <link rel="shortcut icon" type="image/png" href="media/icon.png" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <style type="text/css">
        body {
            font: 14px sans-serif;
        }

        .wrapper {
            width: 350px;
            padding: 20px;
        }
    </style>
</head>

<body class="fundal" align="center">
    <header class="header">
        <h1 class="titlu">Media Digitala</h1>
        <div>
            <a href="https://www.facebook.com/dmc.usv/" target="_blank"><img width="30" height="30" id="fb" src="media/fb.png" alt="logo"></a>
            <a href="https://www.instagram.com/dmc.usv/" target="_blank"><img width="30" height="30" id="insta" src="media/insta.png" alt="logo"></a>
            <a href="http://litere.usv.ro/planlicenta.html" target="_blank"><img width="30" height="30" id="uni" src="media/unii.png" alt="logo"></a>
            <a onclick="window.location.href='login.php'"><img id="user" src="media/user.png" alt="logo" align="right" style="width: 30px; height: 30px;"></a>
    </header>
    <nav class="pagini">
        <div>
            <form id="forc">
                <input class="casete" type="button" value="Home" onclick="window.location.href='Index.php'" />
                <input class="casete" type="button" value="Meserii" onclick="window.location.href='Meserii.php'" />
                <input class="casete" type="button" value="Cursuri" onclick="window.location.href='Cursuri'" />
                <input class="casete" type="button" value="Contact" onclick="window.location.href='Contact'" />
            </form>
        </div>
    </nav>
    <div><img /></div>
    <h2 style="font-size:40px;">Reseteaza Parola</h2>
    <div class="wrapper">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
                <label>Parola Noua</label>
                <input type="password" name="new_password" class="form-control" value="<?php echo $new_password; ?>">
                <span class="help-block"><?php echo $new_password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirma Parola</label>
                <input type="password" name="confirm_password" class="form-control">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" style="background:gray; border:black;" value="Submit">
                <a class="btn btn-link" href="welcome.php" style="background:gray; border:black; color:white">Cancel</a>
            </div>
        </form>
    </div>
    <div class="footer1" align="left">
        <table style="width:100%">
            <td>
                <p><b>Quick Links</b></p>
                <ul>
                    <li><a href="index.php" style="color: rgb(201, 197, 197)">Home</a></li>
                    <li><a href="contact.php" style="color: rgb(201, 197, 197)">Contact</a></li>
                    <li><a href="login.php" style="color: rgb(201, 197, 197)">Cont</a></li>
                </ul>
            </td>
            <td>
                <p><b>Social Media</b></p>
                <ul>
                    <li><a href="https://www.facebook.com/dmc.usv/" style="color: rgb(201, 197, 197)">Facebook</a></li>
                    <li><a href="https://www.instagram.com/dmc.usv/" style="color: rgb(201, 197, 197)">Instagram</a></li>
                </ul>
            </td>
            <td>
                <p><b>Despre noi</b></p>
                <ul>
                    <li><a href="https://flsc.usv.ro/#loaded" style="color: rgb(201, 197, 197)">FLSC</a></li>
                    <li><a href="https://usv.ro/" style="color: rgb(201, 197, 197)">USV</a></li>
                </ul>
            </td>
        </table>
    </div>
    <div class="footer">
        <p>&#169;2021 by Miriam Mihalut.</p>
    </div>
</body>

</html>