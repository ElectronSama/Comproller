<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="kepek/icon.png">
    <title>Comproller - Munkaidő</title>
    <style>

        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
        }
        .clock {
            font-size: 80px;
            margin: -10px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .box-container {
            display: flex;
            justify-content: center;
            gap: 40px;
            margin-top: 40px;
        }
        .box {
            width: 400px;
            min-height: 300px;
            padding: 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            font-weight: bold;
        }
        .yellow-box {
            border-radius: 25px;
            border: 7px solid yellow;
        }
        .blue-box {
            border-radius: 25px;
            border: 7px solid blue;
        }
        .input-group {
            margin: 15px 0;
            font-size: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
        }

        .input-group input {
            max-width: 550px;
            width: 100%;
        }

        input, select {
            font-size: 20px;
            padding: 8px;
            width: 70%;
        }
        .disabled {
            background-color: #d3d3d3;
            pointer-events: none;
            opacity: 0.6; 
        }
        .disabled-div {
            background-color: #d3d3d3;
            padding: 15px;
            border-radius: 10px;
            opacity: 0.6;
        }
        input[disabled], select[disabled] {
            background-color: #d3d3d3;
        }
        .enabled {
            background-color: white;
            opacity: 1;
        }
        #name {
            width: 60%;
            font-size: 18px;
        }

        .button-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        #add-button {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 8px;
            font-size: 22px;
            background-color: green;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            max-width: 300px;
            width: 100%;
            margin: -30px auto;
        }

        @media (max-width: 600px) {
            #add-button {
                padding: 10px 20px;
                font-size: 18px;
                max-width: 200px;
            }
        }

        #add-button:hover {
            background-color: darkgreen;
        }
        
        .error-message {
            padding: 10px;
            color: red;
            font-size: 20px;
            margin-top: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto; 
            border: 2px solid black;
        }

        th, td {
            padding: 6px 12px;
            border: 1px solid black;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        td {
            background-color: #fff;
        }


    </style>
</head>
<body>
    @include('navbarandfooter/nav')
    <div class="clock" id="clock">00:00:00</div>
    <div class="box-container">
        <div class="box yellow-box">
            <div class="input-group">
                <label for="date">Dátum:</label>
                <input type="date" id="date">
            </div>
            <div class="input-group">
                <label for="time">Idő:</label>
                <input type="time" id="time">
            </div>
            <div class="input-group">
                <label for="hours">Munkanap hossza:</label>
                <select id="hours">
                    <option value="">óra</option>
                    <option value="4">4 óra</option>
                    <option value="8">8 óra</option>
                    <option value="12">12 óra</option>
                </select>
            </div>
        </div>
        <div class="box blue-box">
            <div class="input-group disabled-div" id="no-break-div">
                <label for="no-break">Nincs szünet:</label>
            </div>
            <div class="input-group break-group" id="break-group-1">
                <label for="break-time-1">Szünet kezdete:</label>
                <input type="time" id="break-time-1">
            </div>
            <div class="input-group break-group" id="break-group-2">
                <label for="break-time-2">Szünet kezdete:</label>
                <input type="time" id="break-time-2">
            </div>
        </div>
    </div>
    
    <div class="input-group">
        <label for="name">Név:</label>
        <input type="text" id="name" placeholder="Írd be a nevet">
    </div>
    <div class="button-container">
        <button id="add-button">Hozzáadás a táblázathoz</button>
    </div>

    <div id="error-message" class="error-message"></div>

    <table id="info-table">
        <thead>
            <tr>
                <th>Sorszám</th>
                <th>Dolgozó neve</th>
                <th>Munkanap</th>
                <th>Munka kezdete</th>
                <th>Munka befejezése</th>
                <th>1. Szünet kezdete</th>
                <th>1. Szünet vége</th>
                <th>2. Szünet kezdete</th>
                <th>2. Szünet vége</th>
                <th>Ledolgozott órák</th>
                <th>Munkabér</th>
            </tr>
        </thead>
        <tbody>
            <!-- Dinamikus sorok ide kerülnek -->
        </tbody>
    </table>
    
    <script>
        function updateClock() {
            let now = new Date();
            let hours = now.getHours().toString().padStart(2, '0');
            let minutes = now.getMinutes().toString().padStart(2, '0');
            let seconds = now.getSeconds().toString().padStart(2, '0');
            document.getElementById("clock").textContent = `${hours}:${minutes}:${seconds}`;
        }
        setInterval(updateClock, 1000);
        updateClock();

        document.addEventListener("DOMContentLoaded", function() {
            let today = new Date();
            let formattedDate = today.toISOString().split("T")[0];
            document.getElementById("date").setAttribute("max", formattedDate);

            //kék doboz
            let breakGroup1 = document.getElementById("break-group-1");
            let breakGroup2 = document.getElementById("break-group-2");
            let breakTime1 = document.getElementById("break-time-1");
            let breakTime2 = document.getElementById("break-time-2");
            let noBreakDiv = document.getElementById("no-break-div");

            // A kék doboz tiltás
            breakGroup1.classList.add("disabled");
            breakGroup2.classList.add("disabled");
            breakTime1.disabled = true;
            breakTime2.disabled = true;
            noBreakDiv.classList.add("disabled-div");
    });


        // Időbeállitás
        document.getElementById("hours").addEventListener("change", function() {
            let hours = this.value;
            let breakGroup1 = document.getElementById("break-group-1");
            let breakGroup2 = document.getElementById("break-group-2");
            let breakTime1 = document.getElementById("break-time-1");
            let breakTime2 = document.getElementById("break-time-2");
            let noBreakDiv = document.getElementById("no-break-div");

            if (hours == "4") {
                // 4 órás műszak
                breakGroup1.classList.add("disabled");
                breakGroup2.classList.add("disabled");
                breakTime1.disabled = true;
                breakTime2.disabled = true;
                noBreakDiv.classList.remove("disabled-div");
                noBreakDiv.classList.add("enabled");
            } else if (hours == "8") {
                // 8 órás műszak
                breakGroup1.classList.remove("disabled");
                breakGroup2.classList.add("disabled");
                breakTime1.disabled = false;
                breakTime2.disabled = true;
                noBreakDiv.classList.add("disabled-div");
                noBreakDiv.classList.remove("enabled");
            } else if (hours == "12") {
                // 12 órás műszak
                breakGroup1.classList.remove("disabled");
                breakGroup2.classList.remove("disabled");
                breakTime1.disabled = false;
                breakTime2.disabled = false;
                noBreakDiv.classList.add("disabled-div");
                noBreakDiv.classList.remove("enabled");
            } else {
                // Ha nincs választás: minden inaktív
                breakGroup1.classList.add("disabled");
                breakGroup2.classList.add("disabled");
                breakTime1.disabled = true;
                breakTime2.disabled = true;
                noBreakDiv.classList.add("disabled-div");
                noBreakDiv.classList.remove("enabled");
            }
        });

        function szamolMunkaBefejezese(munkakezdete, munkaOrak) {
            // Munkakezdés idejének felbontása
            const [kezdoOra, kezdoPerc] = munkakezdete.split(':').map(Number);

            // Munka óraszámának hozzáadása
            let befejezesOra = kezdoOra + parseInt(munkaOrak);
            let befejezesPerc = kezdoPerc;

            // Ha 24 órán túl lenne, visszaállítjuk
            befejezesOra = befejezesOra % 24;

            // Formázott időpont létrehozása
            const befejezesiIdo = 
                befejezesOra.toString().padStart(2, '0') + ':' + 
                befejezesPerc.toString().padStart(2, '0');

            return befejezesiIdo;
        }

        function szamolSzunetVege(szunetKezdete) {
            if (!szunetKezdete) return '-';

            // Szünet kezdetének felbontása órákra és percekre
            const [kezdoOra, kezdoPerc] = szunetKezdete.split(':').map(Number);

            // Fél óra hozzáadása
            let vegzoOra = kezdoOra;
            let vegzoPerc = kezdoPerc + 30;

            // Ha a percek 60 fölé mennek, óra növelése
            if (vegzoPerc >= 60) {
                vegzoOra++;
                vegzoPerc -= 60;
            }

            // 24 órán túli idő kezelése
            vegzoOra = vegzoOra % 24;

            // Formázott időpont
            const szunetVege = 
                vegzoOra.toString().padStart(2, '0') + ':' + 
                vegzoPerc.toString().padStart(2, '0');

            return szunetVege;
        }

        function ellenorizSzunetIdot(munkakezdete, szunetKezdete) {
            if (!szunetKezdete) return true;

            // Munkakezdés és szünet idejének felbontása
            const [munkakezdOra, munkakezdPerc] = munkakezdete.split(':').map(Number);
            const [szunetKezdOra, szunetKezdPerc] = szunetKezdete.split(':').map(Number);

            // Teljes percben kifejezve a kezdési idő
            const munkakezdPercek = munkakezdOra * 60 + munkakezdPerc;
            const szunetKezdPercek = szunetKezdOra * 60 + szunetKezdPerc;

            // Szünet ellenőrzés
            return szunetKezdPercek > munkakezdPercek;
        }


        document.getElementById("add-button").addEventListener("click", function() {
            let today = new Date();
            let formattedDate = today.toISOString().split("T")[0]; // A mai nap dátuma
            let minDate = today.getFullYear() < 2025 ? formattedDate : "2025-01-01";
            let maxDate = "2025-12-31";

            let dateInput = document.getElementById("date");
            dateInput.setAttribute("min", minDate);
            dateInput.setAttribute("max", maxDate);

            const dolgozoNeve = document.getElementById("name").value;
            const munkaNapja = document.getElementById("date").value;
            const munkakezdete = document.getElementById("time").value;
            const munkaOrak = document.getElementById("hours").value;
            
            const elsoSzunetKezdete = document.getElementById("break-time-1").value;
            const masodikSzunetKezdete = document.getElementById("break-time-2").value;

            const hibaUzenet = document.getElementById("error-message");

            hibaUzenet.textContent = "";

            if (!munkaNapja) {
                hibaUzenet.textContent = "Hiba: A dátum megadása kötelező!";
                return;
            }

            if (new Date(munkaNapja) < new Date("2025-01-01")) {
                hibaUzenet.textContent = "Hiba: Csak 2025-ös dátumok adhatók meg!";
                return;
            }

            if (new Date(munkaNapja) > new Date()) {
                hibaUzenet.textContent = "Hiba: A dátum nem lehet a jövőben!";
                return;
            }

            if (elsoSzunetKezdete && !ellenorizSzunetIdot(munkakezdete, elsoSzunetKezdete)) {
                hibaUzenet.textContent = "Hiba: Az első szünet kezdete nem lehet korábbi, mint a munka kezdete!";
                return;
            }

            if (masodikSzunetKezdete && !ellenorizSzunetIdot(munkakezdete, masodikSzunetKezdete)) {
                hibaUzenet.textContent = "Hiba: A második szünet kezdete nem lehet korábbi, mint a munka kezdete!";
                return;
            }

            const oraberMerteke = 2000;
            const teljesOrabér = munkaOrak * oraberMerteke;
            const munkaBefejezese = szamolMunkaBefejezese(munkakezdete, munkaOrak);
            const elsoSzunetVege = szamolSzunetVege(elsoSzunetKezdete);
            const masodikSzunetVege = szamolSzunetVege(masodikSzunetKezdete);

            if (dolgozoNeve && munkaNapja && munkakezdete && munkaOrak) {
                const tabla = document.getElementById("info-table").getElementsByTagName('tbody')[0];
                const sorSzama = tabla.rows.length + 1;
                const ujSor = tabla.insertRow();
                ujSor.innerHTML = `
                    <td>${sorSzama}</td>
                    <td>${dolgozoNeve}</td>
                    <td>${munkaNapja}</td>
                    <td>${munkakezdete}</td>
                    <td>${munkaBefejezese}</td>
                    <td>${elsoSzunetKezdete || '-'}</td>
                    <td>${elsoSzunetVege}</td>
                    <td>${masodikSzunetKezdete || '-'}</td>
                    <td>${masodikSzunetVege}</td>
                    <td>${munkaOrak} óra</td>
                    <td>${teljesOrabér} Ft</td>
                `;

                // Input mezők törlése
                document.getElementById("name").value = "";
                document.getElementById("date").value = "";
                document.getElementById("time").value = "";
                document.getElementById("hours").value = "";
                document.getElementById("break-time-1").value = "";
                document.getElementById("break-time-2").value = "";

                let breakGroup1 = document.getElementById("break-group-1");
                let breakGroup2 = document.getElementById("break-group-2");
                let breakTime1 = document.getElementById("break-time-1");
                let breakTime2 = document.getElementById("break-time-2");
                let noBreakDiv = document.getElementById("no-break-div");

                breakGroup1.classList.add("disabled");
                breakGroup2.classList.add("disabled");
                breakTime1.disabled = true;
                breakTime2.disabled = true;
                noBreakDiv.classList.add("disabled-div");
            } else {
                hibaUzenet.textContent = "Hiba: Kérjük, töltsd ki az összes mezőt!";
            }
        });
    </script>
    @include('navbarandfooter/footer')
</body>
</html>
