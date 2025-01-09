<!DOCTYPE html>
<html lang="hu">

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="kepek/icon.png">
    <title>Comproller - Profil</title>

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

        #jprofil,#lprofil
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
            transition: transform 0.3s ease-in-out;

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

            background-image: url("kepek/profil_leiras.jpg");
            background-color: rgba(255, 255, 255, 0.600);
            background-blend-mode: overlay;
            border-radius: 10px;
            font-size: 30px;
            padding: 60px;
            color: black;
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

        input
        {

            width: 80%;

        }

        #a_form
        {

            display: none;

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

            <div>

                <h1>Profil adatok:</h1><br>

                <img src="kepek/testkepek/1.PNG" id="lprofil"><br>

                <p id="lnemek"></p><br>

                <p id="lemailcim"></p><br>

                <p id="lprofil_leiras"></p><br>

                <p id="llink1"></p><br>

                <p id="llink2"></p><br>

                <p id="llink3"></p>

            </div>

            <button type="button" onclick="megjelenit()" id="modositos_gomb">Módositás</button>

           <form id="a_form">

                <label>Profil kép:</label><br>
                <input type="file" accept="image/*" id="profilkep"><br>

                <label>Nem:</label><br>

                <select id="nemek">

                    <option value="-">--Válassz nemet--</option><br>
                    <option value="Férfi">Férfi</option><br>
                    <option value="Nő">Nő</option><br>
                    <option value="Egyéb">Egyéb</option><br>

                </select><br>

                <label>Email cím:</label><br>
                <input type="email" placeholder="valaki@gmail.com" id="emailcim"><br>

                <label>Profil leírás:</label><br>
                <textarea placeholder="Profil leírás ide... (opcionális)" id="profil_leiras" rows="4" cols="50"></textarea><br>

                <label>Linkek:</label><br>
                <input type="url" placeholder="Első link... (opcionális)" id="link1"><br>
                <input type="url" placeholder="Második link... (opcionális)" id="link2"><br>
                <input type="url" placeholder="Harmadik link... (opcionális)" id="link3"><br>

                <button type="button" onclick="kvegignez()">Kép mentése</button>
                <button type="button" onclick="vegignez()">Mentés</button>

           </form>

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

            let megjelenitve = false;

            function megjelenit()
            {

                if (megjelenitve == false)
                {
                    let a_form = document.getElementById("a_form");

                    a_form.style.display = "grid";

                    let modositos_gomb = document.getElementById("modositos_gomb");

                    modositos_gomb.textContent = "Vissza";

                    megjelenitve = true;
                }
                else if (megjelenitve == true)
                {

                    a_form = document.getElementById("a_form");

                    a_form.style.display = "none";

                    modositos_gomb = document.getElementById("modositos_gomb");

                    modositos_gomb.textContent = "Módositás";

                    megjelenitve = false;

                }

            }

            let a_form = document.getElementById("a_form");

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

            window.onload = function() 
            {
                if (sessionStorage.getItem("profilkep")) 
                {
                    document.getElementById("jprofil").src = sessionStorage.getItem("profilkep");
                    document.getElementById("lprofil").src = sessionStorage.getItem("profilkep");
                }

                if (sessionStorage.getItem("profil_leiras")) 
                {
                    document.getElementById("lprofil_leiras").textContent = sessionStorage.getItem("profil_leiras");
                }

                if (sessionStorage.getItem("nemek")) 
                {
                    document.getElementById("lnemek").textContent = sessionStorage.getItem("nemek");
                }

                if (sessionStorage.getItem("emailcim")) 
                {
                    document.getElementById("lemailcim").textContent = sessionStorage.getItem("emailcim");
                }

                if (sessionStorage.getItem("link1")) 
                {
                    document.getElementById("llink1").textContent = sessionStorage.getItem("link1");
                }

                if (sessionStorage.getItem("link2")) 
                {
                    document.getElementById("llink2").textContent = sessionStorage.getItem("link2");
                }

                if (sessionStorage.getItem("link3")) 
                {
                    document.getElementById("llink3").textContent = sessionStorage.getItem("link3");
                }
            };

            function kvegignez() 
            {
                let profilkep = document.getElementById("profilkep");
                
                let file = profilkep.files[0];

                if (!file) 
                {
                    alert("Nincs kiválasztva fájl profilképhez!");
                    return;
                }

                let olvaso = new FileReader();
                
                olvaso.onload = function (i) 
                {
                    document.getElementById("jprofil").src = i.target.result;
                    document.getElementById("lprofil").src = i.target.result;
                    sessionStorage.setItem("profilkep", i.target.result);

                    alert("Profilkép frissítve!");
                };

                olvaso.readAsDataURL(file);

            }

            function vegignez()
            {

                    let nemek = document.getElementById("nemek");
                    let emailcim = document.getElementById("emailcim");
                    let profil_leiras = document.getElementById("profil_leiras");
                    let link1 = document.getElementById("link1");
                    let link2 = document.getElementById("link2");
                    let link3 = document.getElementById("link3");

                    let lnemek = document.getElementById("lnemek");
                    let lemailcim = document.getElementById("lemailcim");
                    let lprofil_leiras = document.getElementById("lprofil_leiras");
                    let llink1 = document.getElementById("llink1");
                    let llink2 = document.getElementById("llink2");
                    let llink3 = document.getElementById("llink3");

                    if (nemek.value == "-" || !emailcim.value.includes("@"))
                    {

                        alert("Hiányos adatok!");
                        return;

                    }
                    else
                    {

                        sessionStorage.setItem("nemek",nemek.value);
                        lnemek.textContent = nemek.value;
                        sessionStorage.setItem("emailcim",emailcim.value);
                        lemailcim.textContent = emailcim.value;

                        if (profil_leiras != "")
                        {

                            sessionStorage.setItem("profil_leiras",profil_leiras.value);
                            lprofil_leiras.textContent = profil_leiras.value;
                            
                        }

                        if (link1 != "" && link1.value.includes("."))
                        {

                            sessionStorage.setItem("link1",link1.value);
                            llink1.textContent = link1.value;

                        }

                        if (link2 != "" && link2.value.includes("."))
                        {

                            sessionStorage.setItem("link2",link2.value);
                            llink2.textContent = link2.value;

                        }

                        if (link3 != "" && link3.value.includes("."))
                        {

                            sessionStorage.setItem("link3",link3.value);
                            llink3.textContent = link3.value;

                        }

                    }

            }

            a_form.reset();

        </script>

</body>

</html>