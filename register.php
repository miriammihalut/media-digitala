<?php
require_once "config.php";

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } else {
        $sql = "SELECT id FROM users WHERE username = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            $param_username = trim($_POST["username"]);

            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "This username is already taken.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            mysqli_stmt_close($stmt);
        }
    }

    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have atleast 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Password did not match.";
        }
    }

    if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {

        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);

            if (mysqli_stmt_execute($stmt)) {
                header("location: login.php");
            } else {
                echo "Something went wrong. Please try again later.";
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
    <title>Media Digitala</title>
    <link rel="shortcut icon" type="image/png" href="media/icon.png" />
    <link rel="stylesheet" href="style.css" />
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body {
            font: 14px sans-serif;
        }

        .wrapper {
            width: 350px;
            padding: 20px;
        }
    </style>

    <script>
        function validateForm() {
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirm-password").value;

            if (username == null || username == "") {
                document.getElementById("username-not-completed").style.display = "block";
                return false;
            } else {
                document.getElementById("username-not-completed").style.display = "none";
            }

            if (username[0].toLowerCase() == username[0]) {
                document.getElementById("first-letter-lower-case").style.display = "block";
                return false;
            } else {
                document.getElementById("first-letter-lower-case").style.display = "none";
            }

            if (password == null || password == "") {
                document.getElementById("password-not-completed").style.display = "block";
                return false;
            } else {
                document.getElementById("password-not-completed").style.display = "none";
            }

            if (confirmPassword == null || confirmPassword == "") {
                document.getElementById("confirm-password-not-completed").style.display = "block";
                return false;
            } else {
                document.getElementById("confirm-password-not-completed").style.display = "none";
            }

            if (confirmPassword != password) {
                document.getElementById("error-check-password").style.display = "block";
                return false;
            } else {
                document.getElementById("error-check-password").style.display = "none";
            }
        }
    </script>
</head>

<body class="fundal" align="center">
    <header class="header">
        <h1 class="titlu">Media Digitala</h1>
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
    </nav><br>
    <h2 style="font-size:40px;">Inregistrare</h2>
    <div class="wrapper">
        <form onsubmit="return validateForm()" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Nume de utilizator</label>
                <input id="username" type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
                <span id="username-not-completed" class="help-block" style="display: none;">Completeaza numele de utilizator.</span>
                <span id="first-letter-lower-case" style="display: none;">Prima litera trebuie sa fie majuscula.</span>
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Parola</label>
                <input id="password" type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
                <span id="password-not-completed" style="display: none;">Completeaza parola.</span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirma Parola</label>
                <input id="confirm-password" type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
                <span id="confirm-password-not-completed" style="display: none;">Completeaza parola.</span>
                <span id="error-check-password" style="display: none;">Parolele nu corespund</span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" style="background-color: gray; border:black;" value="Intregistreaza">
                <input type="reset" class="btn btn-default" value="Reseteaza">
            </div>
            <p>Ai deja cont? <a href="login.php" style="color:black;"><b>Logheaza-te</b></a>.</p>
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