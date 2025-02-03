<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="kepek/icon.png">
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
                <div class="kartya_cim">Összes</div>
                <div class="kartya_ertek">{{ $Dolgozokszama }}</div>
                <div class="kartya_leiras">Az összes dolgozó száma a nyilvántartásban.</div>
            </div>
        </div>
        <div class="diagram_tarolo">
            <div class="diagram">
                <div class="diagram_cim">Legutóbbi Események</div>
                <table class="tablazat">
                    <thead>
                        <tr>
                            <th>Esemény</th>
                            <th>Leírás</th>
                            <th>Időpont</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr></tr>
                        <tr></tr>
                        <tr></tr>
                    </tbody>
                </table>
            </div>
            <div class="diagram">
                <div class="diagram_cim">Utóljára felvitt munkavállalók</div>
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
                                <button type="button" class="btn btn-danger btn-sm col-4">-</button>
                                <button type="button" class="btn btn-primary btn-sm col-4">i</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
    @include('navbarandfooter/footer')
</body>
</html>
