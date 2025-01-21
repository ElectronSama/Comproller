<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Irányítópult - Comproller</title>
    <style>
        .iranyitopult_tarolo
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

        .allapot_jelzo
        {
            display: inline-block;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            margin-right: 5px;
        }

        .allapot_aktiv
        {
            background-color: #2ecc71;
        }

        .allapot_fuggyben
        {
            background-color: #f1c40f;
        }

        .allapot_lezart
        {
            background-color: #e74c3c;
        }

        @media (max-width: 768px)
        {
            .diagram_tarolo
            {
                grid-template-columns: 1fr;
            }
            
            .tablazat thead
            {
                display: none;
            }
            
            .tablazat td
            {
                display: block;
                text-align: right;
                padding-left: 50%;
                position: relative;
            }
            
            .tablazat td::before
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

    <div class="iranyitopult_tarolo">
        <div class="kartyak_tarolo">
            <div class="kartya">
                <div class="kartya_cim">Aktív Projektek</div>
                <div class="kartya_ertek">24</div>
                <div class="kartya_leiras">4 új az elmúlt héten</div>
            </div>
            <div class="kartya">
                <div class="kartya_cim">Dolgozók</div>
                <div class="kartya_ertek">156</div>
                <div class="kartya_leiras">12 távoli munkavégző</div>
            </div>
            <div class="kartya">
                <div class="kartya_cim">Havi Bevétel</div>
                <div class="kartya_ertek">12.4M Ft</div>
                <div class="kartya_leiras">+8% az előző hónaphoz képest</div>
            </div>
            <div class="kartya">
                <div class="kartya_cim">Teljesítmény</div>
                <div class="kartya_ertek">92%</div>
                <div class="kartya_leiras">Határidők betartása</div>
            </div>
        </div>

        <div class="diagram_tarolo">
            <div class="diagram">
                <div class="diagram_cim">Aktuális Projektek</div>
                <table class="tablazat">
                    <thead>
                        <tr>
                            <th>Projekt Név</th>
                            <th>Állapot</th>
                            <th>Határidő</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td data-label="Projekt Név">Weboldal Fejlesztés</td>
                            <td data-label="Állapot">
                                <span class="allapot_jelzo allapot_aktiv"></span>Aktív
                            </td>
                            <td data-label="Határidő">2024.02.15</td>
                        </tr>
                        <tr>
                            <td data-label="Projekt Név">Mobil Alkalmazás</td>
                            <td data-label="Állapot">
                                <span class="allapot_jelzo allapot_fuggyben"></span>Függőben
                            </td>
                            <td data-label="Határidő">2024.03.01</td>
                        </tr>
                        <tr>
                            <td data-label="Projekt Név">Adatbázis Migráció</td>
                            <td data-label="Állapot">
                                <span class="allapot_jelzo allapot_lezart"></span>Lezárt
                            </td>
                            <td data-label="Határidő">2024.01.30</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <div class="diagram">
                <div class="diagram_cim">Legutóbbi Események</div>
                <table class="tablazat">
                    <thead>
                        <tr>
                            <th>Esemény</th>
                            <th>Részleg</th>
                            <th>Időpont</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td data-label="Esemény">Új Szerződés Aláírva</td>
                            <td data-label="Részleg">Értékesítés</td>
                            <td data-label="Időpont">Ma, 10:30</td>
                        </tr>
                        <tr>
                            <td data-label="Esemény">Rendszer Frissítés</td>
                            <td data-label="Részleg">IT</td>
                            <td data-label="Időpont">Tegnap, 15:45</td>
                        </tr>
                        <tr>
                            <td data-label="Esemény">Képzés Befejezve</td>
                            <td data-label="Részleg">HR</td>
                            <td data-label="Időpont">2024.01.15</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('navbarandfooter/footer')
</body>
</html>