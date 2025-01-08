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

        #fel
        {

            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            width: 20%;
            padding: 20px;

        }

        #jprofil
        {

            border: none;
            width: 100px;
            height: 100px;
            border-radius: 60px;
            cursor: pointer;

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

            background-image: url("kepek/hatterek/hatter.jpg");
            background-repeat: no-repeat;
            background-color: #36454F;
            font-family: arial;
            color: #000080;

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

        #leiras,nav,#footer
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
            display:flex;
            justify-content: space-between;
            text-align: center;

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

        #jdatum,#jido
        {

            background-color:rgba(182, 208, 226, 0.47);
            border-radius: 40px;

        }

        #datumok
        {

            background-image: url("kepek/datum.PNG");
            width: 40%;
            height: 60%;
            text-align: center;
            color: black;
            border-radius: 10px;
            font-size: 30px;
            padding: 30px;
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
            <a href="{{ url('/dolgozok') }}"> <img src="kepek/nav_iconok/dolgozok.png" id="nav_icon"><br>Dolgozók</a>
            <a><img src="kepek/nav_iconok/felhasznalo.PNG" id="jprofil"><br></a>
        </nav>

        <p>---</p>

        <div id="koszontes">

            <i>
            <h1>Comproller</h1><br>

            <h2></h2>

            <h2>Köszöntünk a Comproller vállalat oldalán!</h2>
            </i>

        </div>

        <p>---</p>

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

        <p>---</p>

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