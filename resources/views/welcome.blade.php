<!DOCTYPE html>
<html lang="hu">


<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="kepek/icon.png">

    <title>Comproller - Főoldal</title>

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

        #jprofil
        {

            border: none;
            width: 100px;
            height: 100px;
            border-radius: 60px;
            cursor: none;

        }

        #nav_logo
        {

            border: none;
            width: 100px;
            height: 100px;
            border-radius: 60px;
            cursor: default;

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

        #cegkepek
        {

            padding: 10px;
            gap: 10px;
            width: 80%;
            height: 80%;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: default;
            animation: kepanimacio 2s infinite alternate ease-in-out;

        }

        @keyframes kepanimacio
        {
            from 
            {
                transform: translateX(-5%);
            }
            to 
            {
                transform: translateX(0%);
            }
            to 
            {
                transform: translateX(5%);
            }
        }

        #leiras,nav
        {

            background-color: rgba(255, 255, 255, 0.623);
            border-radius: 10px;
            font-size: 13px;
            padding: 10px;

        }

        #koszontes
        {

            gap: 10px;
            background-image: url("kepek/ceglogo.PNG");
            background-repeat: no-repeat;
            background-color: rgba(255, 255, 255, 0.800);
            background-blend-mode: overlay;
            border-radius: 10px;
            padding: 10px;
            cursor: none;
            color: #36454F;
            border: 2px solid black;

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

        #epuletid
        {

            width: 600px;
            height: 600px;
            cursor: none;

        }

        table
        {

            border: 2px solid black;

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

        <div id="koszontes">

            <i>
            <h1>Comproller</h1><br>

            <h2></h2>

            <h2>Köszöntünk a Comproller vállalat oldalán!</h2>
            </i>

        </div>

        <div>

            <button type="button" onclick="elvesz()"><</button>

                <img src="kepek/emberek/1.PNG" id="epuletid">

            <button type="button" onclick="hozzaad()">></button>

        </div>

        <div id="cegkepek">

            <img src="kepek/1.PNG">
            <img src="kepek/2.PNG">
            <img src="kepek/3.PNG">

        </div>

        <div id="leiras">

            <h3>Cégünk története<h3><br>
            <p>Cégünk több mint 20 éve van jelen a piacon, és elkötelezettek vagyunk a minőségi szolgáltatások nyújtása iránt. Innovatív megoldásainkkal és szakértő csapatunkkal segítjük ügyfeleinket a siker elérésében.<br>
            Folyamatosan fejlődünk és bővítjük szolgáltatásainkat, hogy megfeleljünk a változó piaci igényeknek. Célunk, hogy hosszú távú, sikeres együttműködést alakítsunk ki partnereinkkel.</p><br>

            <img src="kepek/leiras1.PNG"><br>

            <h3>Megbízhatóságunk</h3><br>
            <p>Cégünk egyik legfontosabb értéke a megbízhatóság. Mindig arra törekszünk, hogy ügyfeleink elvárásainak megfeleljünk, és biztosítsuk számukra a legmagasabb szintű szolgáltatást.<br>
            Proaktív szemléletmóddal és precíz munkavégzéssel dolgozunk, hogy hosszú távú, eredményes kapcsolatokat alakítsunk ki ügyfeleinkkel.</p><br>

            <img src="kepek/leiras2.PNG">

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

            let epuletid = document.getElementById("epuletid");
            let kepindex = 0;

            let manualis = false;

            function valtas()
            {

                epuletid = document.getElementById("epuletid");                

                if (kepindex == 0)
                {

                    epuletid.src = "kepek/emberek/1.PNG";
                    
                }
                else if (kepindex == 1)
                {

                    epuletid.src = "kepek/emberek/2.PNG";

                }
                else if (kepindex == 2)
                {

                    epuletid.src = "kepek/emberek/3.PNG";

                }

            }

            function auto()
            {

                if (manualis == true)
                {

                    kepindex = 0;
                    manualis = false;
                    
                }

                epuletid = document.getElementById("epuletid");                

                if (kepindex == 0)
                {

                    epuletid.src = "kepek/emberek/1.PNG";

                    kepindex++;
                    
                }
                else if (kepindex == 1)
                {

                    epuletid.src = "kepek/emberek/2.PNG";

                    kepindex++;

                }
                else if (kepindex == 2)
                {

                    epuletid.src = "kepek/emberek/3.PNG";

                    kepindex = 0;

                }

            }

            function ido()
            {

                let jido = document.getElementById("jido");

                datum = new Date();

                let ora = datum.getHours();
                let perc = datum.getMinutes();
                let mp = datum.getSeconds();

                jido.innerHTML = ora + ":" + perc + ":" + mp;

            }

            let auto_valtas = setInterval(auto,4000);

            function elvesz()
            {
            
                if (kepindex != 0)
                {
                    kepindex--;
                }

                valtas();

                clearInterval(auto_valtas);

                auto_valtas = setInterval(auto,4000);

                manualis = true;

            }

            function hozzaad()
            {

                if (kepindex != 2)
                {
                    kepindex++;
                }

                valtas();

                clearInterval(auto_valtas);

                auto_valtas = setInterval(auto,4000);

                manualis = true;

            }

            setInterval(ido,1000);          

        </script>

</body>

</html>