<!DOCTYPE html>
<html>

<head>
    <title>Media Digitala</title>
    <meta http-equiv="refresh" content="5;URL='index.php'" />
    <link rel="shortcut icon" type="image/png" href="media/icon.png" />
    <link rel="stylesheet" href="style.css" />
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
    </nav>
    <div><img /></div>
    <div>
        <img />
    </div>
    <div class="informations">
        <br><br>
        <strong>Se salveaza datele!</strong>
        <?php
        include 'connect_database.php';
        $sql = "SELECT ID, Nume, Prenume, Telefon FROM users ORDER BY ID";
        echo "Salutare ... datele pe care dorim sa le salvam sunt: <br>Nume: " . $_POST["Nume"] . "<br>Prenume:" . $_POST["Prenume"] . "<br>Telefon: " . $_POST["Telefon"];
        $sql = "INSERT INTO users (Nume, Prenume, Telefon) VALUES ('" . $_POST["Nume"] . "','" . $_POST["Prenume"] . "','" . $_POST["Telefon"] . "')";

        if ($conn->query($sql) === TRUE) {
            echo "<br><br>New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
        ?>
        <br>
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