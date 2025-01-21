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

    <div class="nyilvantartas_tarolo">
        <div class="fulek_tarolo">
            <button class="ful ful_aktiv">Dolgozók</button>
            <button class="ful">Projektek</button>
            <button class="ful">Eszközök</button>
        </div>

        <div class="szuro_sav">
            <input type="text" class="szuro_mezo" placeholder="Keresés név szerint...">
            <select class="szuro_mezo">
                <option value="">Részleg kiválasztása</option>
                <option value="fejlesztes">Fejlesztés</option>
                <option value="hr">HR</option>
                <option value="penzugy">Pénzügy</option>
            </select>
            <select class="szuro_mezo">
                <option value="">Státusz</option>
                <option value="aktiv">Aktív</option>
                <option value="inaktiv">Inaktív</option>
            </select>
        </div>

        <div class="tablazat_tarolo">
            <?php
                $sql = "SELECT Keresztnev, Vezeteknev, DolgozoID, Email, Munkakor FROM nyilvantartas";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) 
                {
                    echo '<table class="tablazat">';
                    echo '<thead>';
                    echo '    <tr>';
                    echo '        <th>Név</th>';
                    echo '        <th>Azonosító</th>';
                    echo '        <th>Email</th>';
                    echo '        <th>Pozíció</th>';
                    echo '        <th>Státusz</th>';
                    echo '    </tr>';
                    echo '</thead>';
                    echo '<tbody>';
                    while($row = $result->fetch_assoc()) 
                    {
                        echo '<tr>';
                        echo '    <td data-label="Név">' . $row["Keresztnev"] . ' ' . $row["Vezeteknev"] . '</td>';
                        echo '    <td data-label="Azonosító">' . $row["DolgozoID"] . '</td>';
                        echo '    <td data-label="Email">' . $row["Email"] . '</td>';
                        echo '    <td data-label="Pozíció">' . $row["Munkakor"] . '</td>';
                        echo '    <td data-label="Státusz"> <span class="allapot_jelzo allapot_aktiv">Aktív</span> </td>';
                        echo '</tr>';
                    }
                    echo '</tbody>';
                    echo '</table>';
                } 
                else 
                {
                    echo "Nincsenek találatok.";
                }

                $conn->close();
            ?>

            <div class="oldal_leptetok">
                <button class="oldal_gomb">Előző</button>
                <button class="oldal_gomb oldal_gomb_aktiv">1</button>
                <button class="oldal_gomb">2</button>
                <button class="oldal_gomb">3</button>
                <button class="oldal_gomb">Következő</button>
            </div>
        </div>
    </div>

    @include('navbarandfooter/footer')
</body>
</html>