<!DOCTYPE html>
<html>

<head>
    <title>Media Digitala</title>
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
    <p style="font-size:30px; font-family: papyrus;"><b>Ce cursuri vei face?</b></p>
    <?php include 'connect_database.php'; ?>
    <table class="cursuri">
        <tr>
            <?php
            $sql = "SELECT ID, titlu, m1, m2, m3, m4, m5, m6 FROM cursuri ORDER BY ID";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td><b> " . $row['titlu'] . " </b></td><td> " . $row['m1'] . " </td><td> " . $row['m2'] . " </td><td> " . $row['m3'] . " </td><td> " . $row['m4'] . " </td><td> " . $row['m5'] . " </td><td> " . $row['m6'] . "</td></tr>";
                }
            } else {
                echo "0 results";
            }
            ?>
    </table>
    <div><img /><img /></div>
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