<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="kepek/icon.png">
    <title>Kapcsolat</title>
    <style>

        body 
        {
            font-family: Arial, sans-serif;
        }

        img
        {

            width: 15%;
            height: 15%;

        }

        #nav 
        {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #007acc;
            padding: 5px;
            border-radius: 30px;
        }
        #nav a 
        {
            color: white;
            text-decoration: none;
            padding: 5px 15px;
        }
        #nav a:hover 
        {
            background-color: #005f99;
        }

        #profilkep       
        {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            border: 2px solid white;
        }

        #container 
        {
            padding: 32px;
            text-align: center;
        }

        h1 
        {
            color: #007acc;
        }

        .vetites 
        {
            width: 80%;
            max-width: 600px;
            margin: 16px auto;
            border: 2px solid #007acc;
            border-radius: 8px;
        }

        .vetites img 
        {
            width: 100%;
            display: none;
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }

        .vetites img.aktiv
        {
            display: block;
            opacity: 1;
        }

        #leiras 
        {
            color: #333;
        }

        #extra
        {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 400px;
            align-items: flex-start;
            margin-top: 32px;
        }

        #extra img 
        {
            max-width: 300px;
            border: 2px solid #007acc;
            border-radius: 8px;
        }

        #extra #szoveg 
        {
            max-width: 600px;
            text-align: left;
            margin-left: 32px;
        }

        #also
        {
            background-color: #007acc;
            color: white;
            padding: 16px;
            text-align: center;
            border-radius: 30px;
        }

        #also a 
        {
            color: white;
            text-decoration: none;
            padding: 8px 16px;
        }

        #also a:hover 
        {
            background-color: #005f99;
        }

        #felgomb 
        {
            display: inline-block;
            padding: 8px 16px;
            background-color: #007acc;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            cursor: pointer;
        }

        #felgomb:hover 
        {
            background-color: #005f99;
        }

    </style>
</head>
<body>

<nav id="nav">
    <a href="{{ url('/') }}">Kezdőlap</a>
    <a href="{{ url('/rolunk') }}">Rólunk</a>
    <a href="{{ url('/kapcsolat') }}">Kapcsolat</a>
    <a href="{{ url('/profil') }}">Profil</a>
    <a href="{{ url('/dolgozok') }}">Dolgozók</a>
    <div>
        <img src="kepek/felhasznalo.JPG" id="profilkep">
    </div>
</nav>
<div id="container">
    <h1>Kapcsolat</h1>
    <img src="kepek/kapcsolat.png">

    <div id="extra">
        <div>
            <div id="szoveg">
                <h2>Elérhetőségeink:</h2>
                <p>

                    <b>Cím:</b>
                    <br>1234 Budapest, Fő utca 56.<br>

                    <br><b>Telefon:</b><br>
                    +36 1 234 5678<br>

                    <br><b>Email:</b><br>
                    info@comproller.hu<br>

                    <br><b>Weboldal:</b><br>
                    www.comproller.hu

                </p>

            </div>
        </div>
    </div>
    <a href="#" id="felgomb">Vissza a tetejére</a>
</div>

<div id="also">
    <a href="#">Adatvédelmi nyilatkozat</a>
    <a href="#">Felhasználási feltételek</a>
    <a href="#">Kapcsolat</a>
</div>

<script>

    let profilkep = document.getElementById("profilkep");

    window.onload = function() 
    {
        let eleres = sessionStorage.getItem("profilkep");
        if (eleres) 
        {
            profilkep.src = eleres;
        }
        kovetkezo();
    };

</script>

</body>
</html>