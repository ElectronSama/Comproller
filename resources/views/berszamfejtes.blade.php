<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="kepek/icon.png">
    <title>Comproller - Bérszámfejtés</title>
    <style>
        
        .berszamfejtes_tarolo
        {
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .kartyak_tarolo
        {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .kartya
        {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }

        .kartya_cim
        {
            color: #2c3e50;
            font-size: 16px;
            margin-bottom: 10px;
        }

        .kartya_ertek
        {
            color: #34495e;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .kartya_leiras
        {
            color: #7f8c8d;
            font-size: 14px;
        }

        .diagram_tarolo
        {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .diagram
        {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .diagram_cim
        {
            color: #2c3e50;
            font-size: 18px;
            margin-bottom: 15px;
        }

        .tablazat
        {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .tablazat th
        {
            background-color: #2c3e50;
            color: white;
            padding: 12px;
            text-align: left;
        }

        .tablazat td
        {
            padding: 12px;
            border-bottom: 1px solid #e0e0e0;
        }

        .tablazat tr:hover
        {
            background-color: #f5f6fa;
        }

        .statusz_jelzo
        {
            display: inline-block;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            margin-right: 5px;
        }

        .statusz_feldolgozott
        {
            background-color: #2ecc71;
        }

        .statusz_folyamatban
        {
            background-color: #f1c40f;
        }

        .statusz_jovahagyasra_var
        {
            background-color: #e74c3c;
        }

    </style>
</head>
<body>
    @include('navbarandfooter/nav')

    <div class="berszamfejtes_tarolo">
        <div class="kartyak_tarolo">
            <div class="kartya">
                <div class="kartya_cim">Összes Alkalmazott</div>
                <div class="kartya_ertek">156</div>
                <div class="kartya_leiras">12 új belépő a hónapban</div>
            </div>
            <div class="kartya">
                <div class="kartya_cim">Havi Bérköltség</div>
                <div class="kartya_ertek">45.2M Ft</div>
                <div class="kartya_leiras">+5% az előző hónaphoz képest</div>
            </div>
            <div class="kartya">
                <div class="kartya_cim">Cafeteria Keret</div>
                <div class="kartya_ertek">8.3M Ft</div>
                <div class="kartya_leiras">82% felhasználva</div>
            </div>
            <div class="kartya">
                <div class="kartya_cim">Túlóra Kifizetés</div>
                <div class="kartya_ertek">2.1M Ft</div>
                <div class="kartya_leiras">156 óra ebben a hónapban</div>
            </div>
        </div>

        <div class="diagram_tarolo">
            <div class="diagram">
                <div class="diagram_cim">Aktuális Bérszámfejtések</div>
                <table class="tablazat">
                    <thead>
                        <tr>
                            <th>Részleg</th>
                            <th>Státusz</th>
                            <th>Határidő</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td data-label="Részleg">Fejlesztés</td>
                            <td data-label="Státusz">
                                <span class="statusz_jelzo statusz_feldolgozott"></span>Feldolgozva
                            </td>
                            <td data-label="Határidő">2024.02.05</td>
                        </tr>
                        <tr>
                            <td data-label="Részleg">Marketing</td>
                            <td data-label="Státusz">
                                <span class="statusz_jelzo statusz_folyamatban"></span>Folyamatban
                            </td>
                            <td data-label="Határidő">2024.02.05</td>
                        </tr>
                        <tr>
                            <td data-label="Részleg">Értékesítés</td>
                            <td data-label="Státusz">
                                <span class="statusz_jelzo statusz_jovahagyasra_var"></span>Jóváhagyásra vár
                            </td>
                            <td data-label="Határidő">2024.02.05</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <div class="diagram">
                <div class="diagram_cim">Bérkifizetési Napló</div>
                <table class="tablazat">
                    <thead>
                        <tr>
                            <th>Művelet</th>
                            <th>Összeg</th>
                            <th>Dátum</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td data-label="Művelet">Rendszeres Bér Utalás</td>
                            <td data-label="Összeg">42.6M Ft</td>
                            <td data-label="Dátum">2024.01.05</td>
                        </tr>
                        <tr>
                            <td data-label="Művelet">Jutalom Kifizetés</td>
                            <td data-label="Összeg">3.2M Ft</td>
                            <td data-label="Dátum">2024.01.15</td>
                        </tr>
                        <tr>
                            <td data-label="Művelet">Túlóra Elszámolás</td>
                            <td data-label="Összeg">1.8M Ft</td>
                            <td data-label="Dátum">2024.01.20</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('navbarandfooter/footer')
</body>
</html>