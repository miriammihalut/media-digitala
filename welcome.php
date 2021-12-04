<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Media Digitala</title>
    <link rel="shortcut icon" type="image/png" href="media/icon.png" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body {
            font: 14px sans-serif;
            text-align: center;
        }
    </style>
</head>

<body align="center" class="fundal">
    <header class="header">
        <h1 class="titlu">Media Digitala</h1>
        <a href="https://www.facebook.com/dmc.usv/" target="_blank"><img width="30" height="30" id="fb" src="media/fb.png" alt="logo"></a>
        <a href="https://www.instagram.com/dmc.usv/" target="_blank"><img width="30" height="30" id="insta" src="media/insta.png" alt="logo"></a>
        <a href="http://litere.usv.ro/planlicenta.html" target="_blank"><img width="30" height="30" id="uni" src="media/unii.png" alt="logo"></a>
        <a onclick="window.location.href='login.php'"><img id="user" src="media/user.png" alt="logo" align="right" style="width: 30px; height: 30px;"></a>
    </header>
    <nav>
        <div>
            <form id="forc">
                <input class="casete" type="button" value="Home" onclick="window.location.href='Index.php'" />
                <input class="casete" type="button" value="Meserii" onclick="window.location.href='Meserii.php'" />
                <input class="casete" type="button" value="Cursuri" onclick="window.location.href='Cursuri'" />
                <input class="casete" type="button" value="Contact" onclick="window.location.href='Contact'" />
            </form>
        </div>
    </nav>
    <div class="page-header">
        <h1>Buna, <b><?php echo htmlspecialchars($_SESSION["username"]); ?>.</b><br> Ne bucuram ca esti alaturi de noi.</h1>
    </div>
    <p>
        <a href="logout.php" class="btn btn-warning" style="background:gray; border:black;">Deconectare.</a><br><br>
        <a href="reset-password.php" class="btn btn-warning" style="background:gray; border:black;">Reseteaza parola.</a><br><br>
        <a href="rezultate.php" class="btn btn-danger" style="background:gray; border:black;">Afiseaza lista utilizatorilor.</a>
    </p>
    <br><br>
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