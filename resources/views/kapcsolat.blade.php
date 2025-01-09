<!DOCTYPE html>
<html lang="hu">

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="kepek/icon.png">

    <title>Comproller - Kapcsolat</title>

    <style>

        *
        {

            text-decoration: none;

        }

        #footer
        {

            background-color: #2c3e50;
            color: white;
            padding: 20px 0;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;

        }

        #footer a 
        {
            color: white;
            text-decoration: none;
            padding: 0 15px;
            font-family: 'Arial', sans-serif;
            font-size: 15px;
            transition: color 0.3s ease;
            position: relative;
        }

        #footer a:hover 
        {
            color: #3498db;
        }

        #footer a::after 
        {
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 50%;
            background-color: #3498db;
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        #footer a:hover::after 
        {
            width: 70%;
        }


        #jprofil
        {

            border: none;
            width: 100px;
            height: 100px;
            border-radius: 60px;
            cursor: none;

        }

        #fel
        {

            position: fixed;
            bottom: 70px;
            right: 20px;
            opacity: 0.7;
            transition: opacity 0.3s ease, transform 0.3s ease;

        }

        #fel:hover 
        {
            opacity: 1;
            transform: translateY(-5px);
        }

        #fel img 
        {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        #nav_logo
        {

            border: none;
            width: 100px;
            height: 100px;
            border-radius: 60px;
            cursor: none;

        }

        #nav_icon
        {

            width: 40px;
            height: 40px;
            border: 2px solid black;
            border-radius: 60px;

        }

        body
        {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
            min-height: 100vh;
            position: relative;
            font-family: arial;
            color: red;
        }

        body::before
        {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('kepek/hatterek/hatter.jpg') center/cover no-repeat fixed;
            z-index: -1;
        }

        img
        {

            border-radius: 30px;
            width: 15%;
            height: auto;
            border: 2px solid black;
            transition: transform 1.1;

        }

        img:hover
        {

            transform: scale(1.01);           

        }

        #kozepre
        {

            display: grid;
            place-items: center;
            padding-bottom: 80px;
            margin-bottom: 20px;

        }

        #leiras
        {

            background-color: rgba(255, 255, 255, 0.623);
            border-radius: 10px;
            font-size: 30px;
            padding: 10px;
            display: grid;
            justify-items: left;
            align-items: left;
            gap: 10px;

        }

        nav 
        {
            width: 90%;
            display: flex;
            justify-content: space-between;
            text-align: center;
            background-color: rgba(255, 255, 255, 0.623);
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        nav a 
        {
            text-decoration: none;
            color: #333;
                    padding: 10px;
        }

        nav a:hover 
        {
            color: #007bff;
            background-color:rgba(0, 123, 255, 0.11);
            border-radius: 3px;
        }

        table
        {

            border: 2px solid black;

        }

        #jdatum,#jido
        {

            margin: 0;
            font-family: 'Arial', sans-serif;
            font-size: 19.2px;
            color: #2c3e50;

        }

        #jdatum
        {

            font-weight: bold;
            margin-bottom: 5px;

        }

        #datumok
        {

            text-align: center;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            padding: 15px;
            border-radius: 8px;
            margin: 20px auto;
            max-width: 300px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);

        }

        button
        {

            background-color: white;
            border-radius: 30px;
            opacity: 0.7;
            color: black;
            font-size: 20px;
            cursor: pointer;
            transition: transform 1.1;

        }

        button:hover
        {

            transform: scale(1.02);            

        }

    </style>

</head>

<body>

    <div id="kozepre">

        <nav>
            <a><img src="kepek/nav_iconok/nav_logo.PNG" id="nav_logo"><br></a>
            <a href="{{ url('/') }}"> <img src="kepek/nav_iconok/fooldal.png" id="nav_icon"><br>Főloldal</a> 
            <a href="{{ url('/kapcsolat') }}"> <img src="kepek/nav_iconok/telefon.png" id="nav_icon"><br>Kapcsolat</a> 
            <a href="{{ url('/profil') }}"> <img src="kepek/nav_iconok/profil.png" id="nav_icon"><br>Profil</a> 
            <a href="{{ url('/rolunk') }}"> <img src="kepek/nav_iconok/rolunk.png" id="nav_icon"><br>Rólunk</a> 
            <a href="{{ url('/dolgozok') }}"> <img src="kepek/nav_iconok/dolgozok.png" id="nav_icon"><br>Irányitópult</a>
            <a><img src="kepek/nav_iconok/felhasznalo.PNG" id="jprofil"><br></a>
        </nav>

        <div id="leiras">

            <p>
                <b>Elérhetőségeink:</b><br>
                
                ---<br>

                Cím:<br>
                <i>1234 Budapest, Fő utca 56.</i><br>
                
                Telefon:<br>
                <i>+36 1 234 5678</i><br>
            
                Email:<br>
                <i>info@comproller.hu</i><br>
            
                Weboldal:<br>
                <i>www.comproller.hu</i><br>
            </p>

        </div>

        <div id="datumok">

            <p id="jdatum">2000-01-01</p><br>

            <p id="jido">10:00:00</p>

        </div>

        <a href="#" id="fel"><img src="kepek/fel.PNG"></a>

        <footer id="footer">
            <a href="{{ url('/') }}">Főloldal</a> |
            <a href="{{ url('/kapcsolat') }}">Kapcsolat</a> |
            <a href="{{ url('/profil') }}">Profil</a> |
            <a href="{{ url('/rolunk') }}">Rólunk</a> |
            <a href="{{ url('/dolgozok') }}">Dolgozók</a>
        </footer>

    </div>

        <script>

            window.onload = function() 
            {
                if (sessionStorage.getItem("profilkep")) 
                {
                    document.getElementById("jprofil").src = sessionStorage.getItem("profilkep");
                }
            }

            let datum = new Date();

            let ev = datum.getFullYear();
            let honap = datum.getMonth();
            honap++;
            let nap = datum.getDate();

            let jdatum = document.getElementById("jdatum");

            jdatum.innerHTML = ev + "-" + honap + "-" + nap;

            function ido()
            {

                let jido = document.getElementById("jido");

                datum = new Date();

                let ora = datum.getHours();
                let perc = datum.getMinutes();
                let mp = datum.getSeconds();

                jido.innerHTML = ora + ":" + perc + ":" + mp;

            }

            setInterval(ido,1000);    

        </script>

</body>

</html>