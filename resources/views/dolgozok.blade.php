<!DOCTYPE html>
<html lang="hu">

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="kepek/icon.png">

    <title>Comproller - Irányitópult</title>

    <style>

        *
        {

            text-decoration: none;

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
            font-size: 20px;
            padding: 10px;
            display: grid;
            justify-items: left;
            align-items: left;
            gap: 5px;
            margin-bottom: 30px;

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
            font-size: 1.2rem;
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

            background-color: black;
            border-radius: 30px;
            opacity: 0.5;
            color: white;
            font-size: 20px;
            cursor: pointer;
            padding: 15px;

        }

        #a_tablazat
        {

            margin: 20px 0;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);

        }

        table
        {

            width: 100%;
            border-collapse: collapse;
            background-color: #ffffff;
            font-family: Arial, sans-serif;

        }

        thead 
        {
            background-color: #2c3e50;
            color: white;
        }

        td 
        {
            padding: 12px 15px;
            border-bottom: 1px solid #eee;
        }

        tbody tr:nth-child(even) 
        {
            background-color: #f5f6f7;
        }

        #lg_menu
        {
            position: relative;
            width: 300px;
            margin: 20px;
        }

        #lg_kivalasztas
        {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border: 2px solid #2c3e50;
            border-radius: 8px;
            background-color: rgba(255, 255, 255, 0.623);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        #lg_kivalasztas:hover 
        {
            border-color: #3498db;
        }

        #mezo_div
        {
            position: relative;
            width: 300px;
            margin: 20px;
        }

        #lg_mezo
        {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border: 2px solid #2c3e50;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        #lg_mezo:focus
        {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 10px rgba(52, 152, 219, 0.2);
        }

        #mezo_cimke
        {
            position: absolute;
            left: 12px;
            top: -10px;
            background-color: white;
            padding: 0 5px;
            color: #2c3e50;
            font-size: 14px;
        }

        #gombok
        {
            display: flex;
            gap: 20px;
            margin: 20px;
        }

        #gomb
        {
            padding: 12px 24px;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        #hgomb
        {
            background-color: #2ecc71;
            color: white;
        }

        #hgomb:hover 
        {
            background-color: #27ae60;
            transform: translateY(-2px);
        }

        #tgomb
        {
            background-color: #e74c3c;
            color: white;
        }

        #tgomb:hover 
        {
            background-color: #c0392b;
            transform: translateY(-2px);
        }

        #management_form
        {
            background-color:rgba(255, 255, 255, 0.623);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 90%;
            margin: 0 auto;
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

                <h2>Jelenlegi dolgozóink adatai:</h2>
                <p>

                    <div id="a_tablazat">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Dolgozó ID</th>
                                        <th>Név</th>
                                        <th>Email</th>
                                        <th>Telefonszám</th>
                                        <th>Munkakör</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dolgozok as $dolgozo)
                                        <tr>
                                            <td>{{ $dolgozo->DolgozoID }}</td>
                                            <td>{{ $dolgozo->Nev }}</td>
                                            <td>{{ $dolgozo->Email }}</td>
                                            <td>{{ $dolgozo->Telefonszam }}</td>
                                            <td>{{ $dolgozo->Munkakor }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <thead>
                                    <tr>
                                        <th>Cím</th>
                                        <th>Születési Dátum</th>
                                        <th>Bankszámlaszám</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dolgozokreszletek as $dolgozo)
                                        <tr>
                                            <td>{{ $dolgozo->Cim }}</td>
                                            <td>{{ $dolgozo->SzuletesiDatum }}</td>
                                            <td>{{ $dolgozo->Bankszamlaszam }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </p>

                        <h2>Céges adatok:</h2>
                        <table>
                            <thead>
                                <tr>
                                    <th>Kategória</th>
                                    <th>Érték</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Dolgozók száma</td>
                                    <td>{{ $dolgozok->count() }}</td>
                                </tr>
                                <tr>
                                    <td>Havi cégkereslet</td>
                                    <td>1,200,000 HUF</td>
                                </tr>
                                <tr>
                                    <td>EUR-HUF valutaárfolyam</td>
                                    <td>387.45 HUF</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

        </div>

        <div id="management_form">

            <div id="lg_menu">
                <select id="lg_kivalasztas">
                    <option value="" disabled selected>Válassz dolgozót</option>
                    <option value="1">Kiss János</option>
                    <option value="2">Nagy Péter</option>
                    <option value="3">Kovács Anna</option>
                </select>
            </div>

            <div id="mezo_div">
                <label id="mezo_cimke">Új dolgozó neve</label>
                <input type="text" id="lg_mezo" placeholder="Írd be a dolgozó nevét">
            </div>

            <div id="gombok">
                <button id="gomb" class="hgomb">Hozzáadás</button>
                <button id="gomb" class="tgomb">Törlés</button>
            </div>

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