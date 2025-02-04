<!DOCTYPE html>
<html lang="hu">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="kepek/icon.png">
    <meta charset="UTF-8">
    <title>Comproller - Események</title>
    <style>

        body 
        {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        #kozepre 
        {
            width: 95%;
            max-width: 1400px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 
        {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 30px;
        }

        #naptar_kerete 
        {
            background-color: white;
            border: 2px solid #2c3e50;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        #naptar_navigacio 
        {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        #naptar_cim 
        {
            font-size: 1.5em;
            color: #2c3e50;
            text-align: center;
        }

        .nav_gomb 
        {
            background-color: #e1ecf4;
            border: 1px solid #7aa7c7;
            border-radius: 3px;
            color: #39739d;
            padding: 6px 12px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .nav_gomb:hover 
        {
            background-color: #b3d3ea;
        }

        #naptar_container
        {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 10px;
        }

        .naptar_nap 
        {
            border: 1px solid #e0e0e0;
            min-height: 80px;
            padding: 10px;
            text-align: center;
            position: relative;
            transition: background-color 0.3s ease;
            border-radius: 4px;
            margin: 25px;
        }

        .naptar_nap:hover 
        {
            background-color: #e8f4f8;
            cursor: pointer;
        }

        .naptar_nap.aktiv_nap 
        {
            background-color: #e8f4f8;
            border-color: #2c3e50;
        }

        .esemeny 
        {
            background-color: #2c3e50;
            color: white;
            padding: 5px;
            margin: 3px 0;
            border-radius: 3px;
            font-size: 0.8em;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        #esemeny_lista 
        {
            margin-top: 30px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        #esemeny_lista table 
        {
            width: 100%;
            border-collapse: collapse;
        }

        #esemeny_lista thead 
        {
            background-color: #2c3e50;
            color: white;
        }

        #esemeny_lista th, #esemeny_lista td 
        {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
        }

        .gomb_skin 
        {
            background-color: #e1ecf4;
            border: 1px solid #7aa7c7;
            border-radius: 3px;
            color: #39739d;
            padding: 6px 12px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .gomb_skin:hover 
        {
            background-color: #b3d3ea;
        }

        #esemeny_modal 
        {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            z-index: 1000;
        }

        .modal_tartalom 
        {
            background-color: white;
            width: 90%;
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .het_napjai 
        {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            background-color: #2c3e50;
            color: white;
            text-align: center;
            padding: 10px 0;
            font-weight: bold;
        }

    </style>
</head>
<body>
    @include('navbarandfooter/nav')

    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "comproller";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) 
        {
            die("Kapcsolódási hiba: " . $conn->connect_error);
        }
    ?>
    
    <div id="kozepre">
        <h1>Naptár és események</h1>

        <div id="naptar_kerete">
            <div id="naptar_navigacio">
                <button onclick="elozo_honap()" class="nav_gomb">Előző</button>
                <div id="naptar_cim"></div>
                <button onclick="kovetkezo_honap()" class="nav_gomb">Következő</button>
            </div>

            <div class="het_napjai">
                <div>Hétfő</div>
                <div>Kedd</div>
                <div>Szerda</div>
                <div>Csütörtök</div>
                <div>Péntek</div>
                <div>Szombat</div>
                <div>Vasárnap</div>
            </div>

            <div id="naptar_container"></div>
        </div>

        <div id="esemeny_lista">
            <table>
                <thead>
                    <tr>                    
                        <th>Esemény</th>
                        <th>Dátum</th>
                        <th>Műveletek</th>
                    </tr>
                </thead>
                <tbody id="osszes_esemeny"></tbody>
                <?php

                    $sql = "SELECT id, esemeny_neve, datum FROM esemenyek";
                    $result = $conn->query($sql);

                    if ($result-> num_rows > 0) 
                    {
                        while ($row = $result->fetch_assoc()) 
                        {
                            echo '<tr>';
                            echo '    <td data-label="Esemény Neve">' . htmlspecialchars($row["esemeny_neve"]) . '</td>';
                            echo '    <td data-label="Dátum">' . htmlspecialchars($row["datum"]) . '</td>';
                            echo '    <td data-label="Műveletek">';
                            echo '        <form action="torles.php" method="post" id="form2" target="/events">';
                            echo '            <input type="hidden" name="esemeny_neve" value="' . htmlspecialchars($row["esemeny_neve"]) . '" >';
                            echo '            <input type="submit" class="gomb_skin" value="Törlés" onclick="oldal_frissites()">';
                            echo '        </form>';                            
                            echo '    </td>';
                            echo '</tr>';
                        }
                    }

                    $conn->close();

                ?>

            </table>
        </div>

        <div id="esemeny_modal" style="display: none;">
            <div class="modal_tartalom">
                <h2 id="datum_cim">Új esemény hozzáadása</h2>
                <form action="hozzaadas.php" method="post" onsubmit="return ellenorzes();" target="/events" id="form1">
                    <input type="hidden" name="datum" id="modal_datum_input">
                    <input type="text" name="esemeny_leiras" id="esemeny_bevitel" placeholder="Esemény leírása" 
                        style="width: 100%; padding: 10px; margin-bottom: 10px;" required>
                    <button type="submit" class="gomb_skin" onclick="oldal_frissites()">Mentés</button>
                    <button type="button" onclick="modal_bezarasa()" class="gomb_skin">Mégsem</button>
                </form>
            </div>
        </div>


    </div>

    @include('navbarandfooter/footer')

    <script>

        let aktualis_ev = new Date().getFullYear();
        let aktualis_honap = new Date().getMonth();
        let kivalasztott_datum = null;
        let naptar_esemenyek = {};

        function cimfrissites() 
        {
            let honapok = [
                'Január', 'Február', 'Március', 'Április', 'Május', 'Június', 
                'Július', 'Augusztus', 'Szeptember', 'Október', 'November', 'December'
            ];
            document.getElementById('naptar_cim').textContent = 
                `${honapok[aktualis_honap]} ${aktualis_ev}`;
        }

        function elozo_honap() 
        {
            aktualis_honap--;
            if (aktualis_honap < 0) 
            {
                aktualis_honap = 11;
                aktualis_ev--;
            }
            naptar_frissites();
        }

        function kovetkezo_honap() 
        {
            aktualis_honap++;
            if (aktualis_honap > 11) 
            {
                aktualis_honap = 0;
                aktualis_ev++;
            }
            naptar_frissites();
        }

        function naptar_frissites() 
        {
            cimfrissites();
            
            let naptar_kontenjer = document.getElementById('naptar_container');
            naptar_container.innerHTML = '';

            let honap_elso_napja = new Date(aktualis_ev, aktualis_honap, 1);
            let honap_utolso_napja = new Date(aktualis_ev, aktualis_honap + 1, 0);

            let elso_nap_indexe = honap_elso_napja.getDay() === 0 ? 7 : honap_elso_napja.getDay();
            
            for (let i = 1; i < elso_nap_indexe; i++) 
            {
                let ures_nap = document.createElement('div');
                ures_nap.classList.add('naptar_nap');
                ures_nap.style.backgroundColor = '#f9f9f9';
                ures_nap.style.color = '#cccccc';
                naptar_container.appendChild(ures_nap);
            }

            for (let nap = 1; nap <= honap_utolso_napja.getDate(); nap++) 
            {
                let nap_elem = document.createElement('div');
                nap_elem.classList.add('naptar_nap');
                nap_elem.textContent = nap;
                
                let datum = `${aktualis_ev}-${String(aktualis_honap+1).padStart(2, '0')}-${String(nap).padStart(2, '0')}`;
                nap_elem.setAttribute('data-datum', datum);
                
                if (naptar_esemenyek[datum]) 
                {
                    naptar_esemenyek[datum].forEach(function(esemeny) 
                    {
                        let esemeny_elem = document.createElement('div');
                        esemeny_elem.classList.add('esemeny');
                        esemeny_elem.textContent = esemeny;
                        nap_elem.appendChild(esemeny_elem);
                    });
                }

                nap_elem.addEventListener('click', datum_valasztas);
                naptar_container.appendChild(nap_elem);
            }

            esemeny_frissites();
        }

        function datum_valasztas(esemeny) 
        {
            let elozo = document.querySelector('.aktiv_nap');
            if (elozo) elozo.classList.remove('aktiv_nap');

            esemeny.currentTarget.classList.add('aktiv_nap');
            kivalasztott_datum = esemeny.currentTarget.getAttribute('data-datum');

            document.getElementById('datum_cim').textContent = kivalasztott_datum;
            document.getElementById('modal_datum_input').value = kivalasztott_datum;
            document.getElementById('esemeny_modal').style.display = 'block';
        }

        function esemeny_hozzaadasa() 
        {
            let esemeny_input = document.getElementById('esemeny_bevitel');
            let esemeny = esemeny_input.value.trim();

            if (esemeny && kivalasztott_datum) 
            {
                if (!naptar_esemenyek[kivalasztott_datum]) 
                {
                    naptar_esemenyek[kivalasztott_datum] = [];
                }

                naptar_esemenyek[kivalasztott_datum].push(esemeny);
                
                esemeny_bevitel.value = '';
                modal_bezarasa();
                naptar_frissites();
            }
        }

        function esemeny_frissites() 
        {
            let tbody = document.getElementById('osszes_esemeny');
            tbody.innerHTML = '';

            Object.keys(naptar_esemenyek).forEach(function(datum) 
            {
                naptar_esemenyek[datum].forEach(function(esemeny)
                {
                    let sor = tbody.insertRow();
                    sor.insertCell(0).textContent = datum;
                    sor.insertCell(1).textContent = esemeny;
                    
                    let torles_gomb = document.createElement('button');
                    torles_gomb.textContent = 'Törlés';
                    torles_gomb.classList.add('gomb_skin');
                    torles_gomb.onclick = function() 
                    {
                        naptar_esemenyek[datum] = naptar_esemenyek[datum].filter(function(e) 
                        {
                            return e !== esemeny;
                        });

                        if (naptar_esemenyek[datum].length === 0) 
                        {
                            delete naptar_esemenyek[datum];
                        }
                        naptar_frissites();
                    };
                    
                    let muvelet = sor.insertCell(2);
                    muvelet.appendChild(torles_gomb);
                });
            });
        }

        function modal_megnyitasa() 
        {
            document.getElementById("esemeny_modal").style.display = "block";
        }

        function modal_bezarasa() 
        {
            document.getElementById("esemeny_modal").style.display = "none";
        }

        function ellenorzes() 
        {
            let leiras = document.getElementById("esemeny_bevitel").value.trim();
            let datum = document.getElementById("modal_datum_input").value.trim();

            if (leiras === "" || datum === "") 
            {
                alert("Kérjük, töltsd ki az összes mezőt!");
                return false;
            }

            return true;

        }

        naptar_frissites();

        function oldal_frissites()
        {

            window.location.href = '/events';

        }

        let form1 = document.getElementById("form1");
        let form2 = document.getElementById("form2");

        form1.reset();
        form2.reset();

    </script>
</body>
</html>
