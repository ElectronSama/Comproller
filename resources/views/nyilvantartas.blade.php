<!DOCTYPE html>
<html lang="hu">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="kepek/icon.png">
    <title>Comproller - Nyilvántartás</title>
    <style>
        .nyilvantartas_tarolo
        {
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .fulek_tarolo
        {
            margin-bottom: 30px;
            border-bottom: 2px solid #e0e0e0;
        }

        .ful
        {
            display: inline-block;
            padding: 10px 20px;
            margin-right: 10px;
            cursor: pointer;
            border: none;
            background: none;
            color: #7f8c8d;
        }

        .ful_aktiv
        {
            color: #2c3e50;
            border-bottom: 2px solid #2c3e50;
            margin-bottom: -2px;
        }

        .szuro_sav
        {
            background-color: white;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .szuro_mezo
        {
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            flex: 1;
            min-width: 200px;
        }

        .tablazat_tarolo
        {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .tablazat
        {
            width: 100%;
            border-collapse: collapse;
        }

        .tablazat th
        {
            background-color: #2c3e50;
            color: white;
            padding: 15px;
            text-align: left;
        }

        .tablazat td
        {
            padding: 12px 15px;
            border-bottom: 1px solid #e0e0e0;
        }

        .tablazat tr:hover
        {
            background-color: #f5f6fa;
        }

        .oldal_leptetok
        {
            display: flex;
            justify-content: center;
            padding: 20px;
            gap: 10px;
        }

        .oldal_gomb
        {
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: white;
            cursor: pointer;
        }

        .oldal_gomb:hover
        {
            background-color: #f5f6fa;
        }

        .oldal_gomb_aktiv
        {
            background-color: #2c3e50;
            color: white;
            border: none;
        }

        .muvelet_gomb
        {
            background-color: #e1ecf4;
            border-radius: 3px;
            border: 1px solid #7aa7c7;
            padding: 5px 10px;
            color: #39739d;
            cursor: pointer;
            margin-right: 5px;
        }

        .muvelet_gomb:hover
        {
            background-color: #b3d3ea;
        }

        .allapot_jelzo
        {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: bold;
        }

        .allapot_aktiv
        {
            background-color: #e8f5e9;
            color: #2e7d32;
        }

        .allapot_inaktiv
        {
            background-color: #ffebee;
            color: #c62828;
        }

        @media (max-width: 768px)
        {
            .szuro_sav
            {
                flex-direction: column;
            }

            .szuro_mezo
            {
                width: 100%;
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
    <div class="nyilvantartas_tarolo">
        <div class="fulek_tarolo">
            <button class="ful ful_aktiv">Dolgozók</button>
            <button class="ful">Felvétel</button>
            <button class="ful">Eszközök</button>
        </div>

        <div class="tablazat_tarolo">
            <table class="tablazat">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Vezetéknév</th>
                        <th>Keresztnév</th>
                        <th>Munkakör</th>
                        <th>Eszközök</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Dolgozok as $Dolgozo)
                        <tr>
                            <td>{{ $Dolgozo->DolgozoID }}</td>
                            <td>{{ $Dolgozo->Vezeteknev }}</td>
                            <td>{{ $Dolgozo->Keresztnev }}</td>
                            <td>{{ $Dolgozo->Munkakor }}</td>
                            <td>
                                <button class="muvelet_gomb">➖</button>
                                <button class="muvelet_gomb">ℹ️</button>
                                <button class="muvelet_gomb">💬</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @include('navbarandfooter/footer')
</body>
</html>