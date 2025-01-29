<!DOCTYPE html>
<html lang="hu">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="kepek/icon.png">
    <meta charset="UTF-8">
    <title>Comproller - Munkaidő</title>
    <style>
        .navbar {
            background-color: #7568ff;
            border-bottom: #9d94ff 10px solid;
            width: 100%;
        }

        .nav-link {
            color: #c7d8ff;
            font-weight: bold;
            text-decoration: none;
            margin: 0 15px;
        }

        .nav-link:hover {
            color: #0d214e;
            font-weight: bold;
            letter-spacing: 5px;
            transition: 0.7s;
        }

        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 0px;
            box-sizing: border-box;
        }

        .ora-tarto {
            margin-top: 30px;
            padding: 20px;
            border: 5px solid #007BFF;
            border-radius: 15px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
            background-color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 20px;
            width: 100%;
            max-width: 600px;
        }

        .ora {
            font-size: 5rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }

        .gombok {
            display: flex;
            gap: 10px;
        }

        .gombok button {
            padding: 10px 20px;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
        }

        .inditas {
            background-color: #28a745;
        }

        .szunet {
            background-color: #ffc107;
        }

        .befejezes {
            background-color: #dc3545;
        }

        .letiltva {
            background-color: #ccc;
            cursor: not-allowed;
            opacity: 0.6;
        }

        .nev-bemenet-tarto {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .nev-bemenet-tarto input {
            padding: 10px;
            font-size: 1rem;
            border: 2px solid #007BFF;
            border-radius: 5px;
            margin-bottom: 10px;
            width: 250px;
        }

        .nev-bemenet-tarto button {
            padding: 10px 20px;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            background-color: #007BFF;
            color: white;
            cursor: pointer;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
        }

        .tablazat-tarto {
            border-radius: 25px;
            max-height: 400px;
            overflow-y: auto;
            width: 100%;
            max-width: 600px;
            border: none; /* A táblázat összes vonalának eltávolítása */
        }

        table {
            border-radius: 25px;
            border-collapse: collapse;
            width: 100%;
            background: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            border: none; /* A táblázat összes vonalának eltávolítása */
        }

        table tr {
            border-bottom: 1px solid #ddd; /* Csak vízszintes vonalak megjelenítése */
        }

        th, td {
            text-align: center;
            border: none; /* Függőleges vonalak eltávolítása */
            padding: 10px;
        }

        th {
            text-align: center;
            background-color: #007BFF;
            color: white;
        }


        .szerkesztes-ikon {
            cursor: pointer;
            color: #007BFF;
        }

        .kiemelt {
            background-color: #e0f7fa;
        }

        .gombok {
            display: none;
        }

        .gombok.lathato {
            display: flex;
        }

        footer
        {
            background-color:#7568ff;
            border-top:#9d94ff 10px solid;
            color: #c7d8ff;
            font-weight: bold;
            width: 100%;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
        }
    </style>
</head>
<body>
    @include('navbarandfooter/nav')

<div class="ora-tarto">
        <div class="ora" id="ora">00:00:00</div>
        <div class="gombok" id="gombok">
            <button class="inditas" onclick="rogzitesInditas()" disabled>Kezdés</button>
            <button class="szunet" onclick="rogzitesSzunet()" disabled>Szünet</button>
            <button class="befejezes" onclick="rogzitesBefejezes()" disabled>Befejezés</button>
        </div>
        <div class="nev-bemenet-tarto">
            <input type="text" id="munkasNev" placeholder="Irj be egy munkás ember nevét!">
            <button onclick="hozzaadasATablazathoz()">Hozzadás</button>
        </div>
    </div>

    <div class="tablazat-tarto">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Név</th>
                    <th>Dátum</th>
                    <th>Kezdés ideje</th>
                    <th>Szünet ideje</th>
                    <th>Befejezés ideje</th>
                    <th>Szerkesztés</th>
                </tr>
            </thead>
            <tbody id="tablazatTest">
            </tbody>
        </table>
    </div>

    <script>
        let munkasIndex = 0;
        let aktualisMunkasSor = null;
        let gombokAllapota = [];
        let kezdesiIdok = [];

        function frissitesOra() {
            const oraElem = document.getElementById('ora');
            const most = new Date();
            const orak = String(most.getHours()).padStart(2, '0');
            const percek = String(most.getMinutes()).padStart(2, '0');
            const masodpercek = String(most.getSeconds()).padStart(2, '0');
            oraElem.textContent = `${orak}:${percek}:${masodpercek}`;
        }

        function hozzaadasATablazathoz() {
            const kiemeltSorok = document.querySelectorAll('.kiemelt');
            kiemeltSorok.forEach(sor => sor.classList.remove('kiemelt'));

            const nevBemenet = document.getElementById('munkasNev');
            const nev = nevBemenet.value.trim();
            if (nev) {
                munkasIndex++;
                const tablazatBody = document.getElementById('tablazatTest');
                const ujSor = document.createElement('tr');
                const ma = new Date().toLocaleDateString();

                ujSor.innerHTML = `
                    <td>${munkasIndex}</td>
                    <td>${nev}</td>
                    <td>${ma}</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td><span class="szerkesztes-ikon" onclick="szerkesztesSor(${munkasIndex - 1})">✏️</span></td>
                `;
                tablazatBody.appendChild(ujSor);
                nevBemenet.value = '';

                gombokAllapota.push({inditas: false, szunet: true, befejezes: true});
                kezdesiIdok.push(null);

                gombokLathatosaga();
                gombokAllapotBeallitas(munkasIndex - 1);

                szerkesztesSor(munkasIndex - 1);

                const tablazatTarto = document.querySelector('.tablazat-tarto');
                tablazatTarto.scrollTop = tablazatTarto.scrollHeight;
            }
        }

        function gombokLathatosaga() {
            const gombok = document.getElementById('gombok');
            const tablazatBody = document.getElementById('tablazatTest');
            if (tablazatBody.children.length > 0) {
                gombok.classList.add('lathato');
            } else {
                gombok.classList.remove('lathato');
            }
        }

        function gombokAllapotBeallitas(sorIndex) {
            const inditasBtn = document.querySelector('.inditas');
            const szunetBtn = document.querySelector('.szunet');
            const befejezesBtn = document.querySelector('.befejezes');
            const allapot = gombokAllapota[sorIndex];

            inditasBtn.disabled = allapot.inditas;
            szunetBtn.disabled = allapot.szunet;
            befejezesBtn.disabled = allapot.befejezes;

            inditasBtn.classList.toggle('letiltva', allapot.inditas);
            szunetBtn.classList.toggle('letiltva', allapot.szunet);
            befejezesBtn.classList.toggle('letiltva', allapot.befejezes);
        }

        function rogzitesInditas() {
            const sorIndex = aktualisMunkasSor;
            gombokAllapota[sorIndex] = {inditas: true, szunet: false, befejezes: false};
            gombokAllapotBeallitas(sorIndex);

            const most = new Date();
            const kezdesiIdo = most.toLocaleTimeString();
            kezdesiIdok[sorIndex] = kezdesiIdo;

            const sorok = document.querySelectorAll('tr');
            sorok[sorIndex + 1].cells[3].textContent = kezdesiIdo;
        }

        function rogzitesSzunet() {
            const sorIndex = aktualisMunkasSor;
            gombokAllapota[sorIndex] = {inditas: true, szunet: true, befejezes: false};
            gombokAllapotBeallitas(sorIndex);

            const most = new Date();
            const szunetIdo = most.toLocaleTimeString();

            const sorok = document.querySelectorAll('tr');
            sorok[sorIndex + 1].cells[4].textContent = szunetIdo;
        }

        function rogzitesBefejezes() {
            const sorIndex = aktualisMunkasSor;
            gombokAllapota[sorIndex] = {inditas: true, szunet: true, befejezes: true};
            gombokAllapotBeallitas(sorIndex);

            const most = new Date();
            const befejezesIdo = most.toLocaleTimeString();

            const sorok = document.querySelectorAll('tr');
            sorok[sorIndex + 1].cells[5].textContent = befejezesIdo;
        }

        function szerkesztesSor(sorIndex) {
            const sorok = document.querySelectorAll('tr');
            sorok.forEach((sor, index) => {
                if (index === sorIndex + 1) {
                    sor.classList.add('kiemelt');
                } else {
                    sor.classList.remove('kiemelt');
                }
            });

            aktualisMunkasSor = sorIndex;
            gombokAllapotBeallitas(sorIndex);
        }

        setInterval(frissitesOra, 1000);
    </script>

    @include('navbarandfooter/footer')
</body>
</html>
