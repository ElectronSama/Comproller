<!DOCTYPE html>
<html lang="hu">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="kepek/icon.png">
    <title>Comproller - Munkaidő</title>
    <style>
        .munkaido_tarolo
        {
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .felso_sav
        {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 10px;
        }

        .datum_valaszto
        {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .datum_gomb
        {
            padding: 8px 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: white;
            cursor: pointer;
        }

        .datum_gomb:hover
        {
            background-color: #f5f6fa;
        }

        .aktualis_datum
        {
            font-size: 18px;
            font-weight: bold;
            color: #2c3e50;
        }

        .idozito_kartya
        {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
            text-align: center;
        }

        .ido_kijelzo
        {
            font-size: 48px;
            font-weight: bold;
            color: #2c3e50;
            margin: 20px 0;
        }

        .idozito_gombok
        {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .kezdes_gomb
        {
            padding: 10px 20px;
            border-radius: 4px;
            border: none;
            background-color: #27ae60;
            color: white;
            cursor: pointer;
        }

        .szunet_gomb
        {
            padding: 10px 20px;
            border-radius: 4px;
            border: none;
            background-color: #f39c12;
            color: white;
            cursor: pointer;
        }

        .befejez_gomb
        {
            padding: 10px 20px;
            border-radius: 4px;
            border: none;
            background-color: #e74c3c;
            color: white;
            cursor: pointer;
        }

        .naptar_nezet
        {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 10px;
            margin-bottom: 20px;
        }

        .naptar_fejlec
        {
            text-align: center;
            font-weight: bold;
            color: #2c3e50;
            padding: 10px;
        }

        .naptar_nap
        {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
            padding: 10px;
            min-height: 100px;
            cursor: pointer;
        }

        .naptar_nap:hover
        {
            background-color: #f5f6fa;
        }

        .mai_nap
        {
            border: 2px solid #3498db;
        }

        .munkaido_lista
        {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .munkaido_lista table
        {
            width: 100%;
            border-collapse: collapse;
        }

        .munkaido_lista th
        {
            background-color: #2c3e50;
            color: white;
            padding: 15px;
            text-align: left;
        }

        .munkaido_lista td
        {
            padding: 12px 15px;
            border-bottom: 1px solid #e0e0e0;
        }

        .munkaido_lista tr:hover
        {
            background-color: #f5f6fa;
        }

        .statusz_jelzo
        {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 12px;
        }

        .statusz_aktiv
        {
            background-color: #e8f5e9;
            color: #2e7d32;
        }

        .statusz_szunet
        {
            background-color: #fff3e0;
            color: #f57c00;
        }

        .statusz_befejezett
        {
            background-color: #ffebee;
            color: #c62828;
        }

        @media (max-width: 768px)
        {
            .felso_sav
            {
                flex-direction: column;
                align-items: stretch;
            }

            .naptar_nezet
            {
                grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            }
            
            .munkaido_lista thead
            {
                display: none;
            }
            
            .munkaido_lista td
            {
                display: block;
                text-align: right;
                padding-left: 50%;
                position: relative;
            }
            
            .munkaido_lista td::before
            {
                content: attr(data-label);
                position: absolute;
                left: 12px;
                font-weight: bold;
            }
        }
    </style>
</head>
<body>
    @include('navbarandfooter/nav')

    <div class="munkaido_tarolo">
        <div class="felso_sav">
            <div class="datum_valaszto">
                <button class="datum_gomb">❮</button>
                <span class="aktualis_datum">2024 Január</span>
                <button class="datum_gomb">❯</button>
            </div>
        </div>

        <div class="idozito_kartya">
            <h2>Mai munkaidő</h2>
            <div class="ido_kijelzo">07:45:12</div>
            <div class="idozito_gombok">
                <button class="kezdes_gomb">Kezdés</button>
                <button class="szunet_gomb">Szünet</button>
                <button class="befejez_gomb">Befejezés</button>
            </div>
        </div>

        <div class="naptar_nezet">
            <div class="naptar_fejlec">H</div>
            <div class="naptar_fejlec">K</div>
            <div class="naptar_fejlec">Sz</div>
            <div class="naptar_fejlec">Cs</div>
            <div class="naptar_fejlec">P</div>
            <div class="naptar_fejlec">Sz</div>
            <div class="naptar_fejlec">V</div>

            <div class="naptar_nap">1</div>
            <div class="naptar_nap">2</div>
            <div class="naptar_nap">3</div>
            <div class="naptar_nap">4</div>
            <div class="naptar_nap">5</div>
            <div class="naptar_nap">6</div>
            <div class="naptar_nap">7</div>
        </div>

        <div class="munkaido_lista">
            <table>
                <thead>
                    <tr>
                        <th>Dátum</th>
                        <th>Kezdés</th>
                        <th>Befejezés</th>
                        <th>Összes idő</th>
                        <th>Státusz</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td data-label="Dátum">2024.01.17</td>
                        <td data-label="Kezdés">08:00</td>
                        <td data-label="Befejezés">-</td>
                        <td data-label="Összes idő">07:45:12</td>
                        <td data-label="Státusz">
                            <span class="statusz_jelzo statusz_aktiv">Aktív</span>
                        </td>
                    </tr>
                    <tr>
                        <td data-label="Dátum">2024.01.16</td>
                        <td data-label="Kezdés">08:15</td>
                        <td data-label="Befejezés">16:30</td>
                        <td data-label="Összes idő">08:15:00</td>
                        <td data-label="Státusz">
                            <span class="statusz_jelzo statusz_befejezett">Befejezett</span>
                        </td>
                    </tr>
                    <tr>
                        <td data-label="Dátum">2024.01.15</td>
                        <td data-label="Kezdés">08:00</td>
                        <td data-label="Befejezés">16:00</td>
                        <td data-label="Összes idő">08:00:00</td>
                        <td data-label="Státusz">
                            <span class="statusz_jelzo statusz_befejezett">Befejezett</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    @include('navbarandfooter/footer')
</body>
</html>