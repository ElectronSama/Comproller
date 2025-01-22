<!DOCTYPE html>
<html lang="hu">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="kepek/icon.png">
    <title>Comproller - Események</title>
    <style>
        #kozepre
        {
            display: grid;
            align-items: center;
            justify-content: center;
            gap: 20px;
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        h1 
        {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 30px;
        }

        thead 
        {
            background-color: #2c3e50;
            color: white;
            text-transform: uppercase;
            font-weight: bold;
        }

        th, td 
        {
            padding: 15px 20px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
        }

        tbody tr:hover 
        {
            background-color: #e8f4f8;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        #a_tablazat 
        {
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            background-color: white;
            margin-bottom: 30px;
            width: 100%;
        }

        #kereses_bemenet,
        #sor_bemenet,
        #esemeny_bemenet
        {
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin: 10px;
            font-size: 14px;
            width: 250px;
        }

        .button-8 
        {
            background-color: #e1ecf4;
            border-radius: 3px;
            border: 1px solid #7aa7c7;
            box-shadow: rgba(255, 255, 255, .7) 0 1px 0 0 inset;
            box-sizing: border-box;
            color: #39739d;
            cursor: pointer;
            display: inline-block;
            font-family: -apple-system,system-ui,"Segoe UI","Liberation Sans",sans-serif;
            font-size: 13px;
            font-weight: 400;
            line-height: 1.15385;
            margin: 10px;
            padding: 8px .8em;
            position: relative;
            text-align: center;
            text-decoration: none;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            vertical-align: baseline;
            white-space: nowrap;
        }

        .button-8:hover,
        .button-8:focus 
        {
            background-color: #b3d3ea;
            color: #2c5777;
        }

        .button-8:active 
        {
            background-color: #a0c7e4;
            box-shadow: none;
            color: #2c5777;
        }

        @media (max-width: 768px) 
        {
            #kozepre
            {
                padding: 10px;
            }

            table, thead, tbody, th, td, tr 
            {
                display: block;
            }
            
            th, td 
            {
                text-align: left;
                padding: 12px 15px;
            }

            thead 
            {
                display: none;
            }

            tr 
            {
                margin-bottom: 15px;
                border-bottom: 2px solid #ddd;
            }

            #kereses_bemenet,
            #sor_bemenet,
            #esemeny_bemenet
            {
                width: 100%;
                margin: 5px 0;
            }

            .button-8 
            {
                width: 100%;
                margin: 5px 0;
            }
        }
    </style>
</head>
<body>
    @include('navbarandfooter/nav')
    
    <div>
        
    </div>

    <div id="kozepre">
        <h1>Jelenlegi események a cégnél:</h1>

        <table id="a_tablazat">
            <thead>
                <tr>
                    <th>Oszlop 1</th>
                    <th>Oszlop 2</th>
                    <th>Oszlop 3</th>
                </tr>
            </thead>
            <tbody> 
                <tr id="sor1">
                </tr>
                <tr id="sor2">
                </tr>
                <tr id="sor3">
                </tr>
            </tbody>
        </table>

        <div>
            <label>Keresés:</label>
            <input type="text" id="kereses_bemenet" placeholder="Írj be egy keresett eseményt...">
            <button type="button" onclick="kereses()" class="button-8" role="button">Keresés</button>
        </div>

        <div>
            <input type="text" id="sor_bemenet" placeholder="Írj be egy sort...">
            <input type="text" id="esemeny_bemenet" placeholder="Írj be egy eseményt...">
            <button onclick="hozzaadas()" class="button-8" role="button">Új esemény hozzáadása</button>
        </div>
    </div>

    @include('navbarandfooter/footer')

    <script>       
        let sor1_esemenyek = 0;
        let sor2_esemenyek = 0;
        let sor3_esemenyek = 0;

        let sor1_lista = [];
        let sor2_lista = [];
        let sor3_lista = [];

        function hozzaadas() 
        {
            let sor_bemenet = document.getElementById("sor_bemenet").value;
            let esemeny_bemenet = document.getElementById("esemeny_bemenet").value;

            if (sor_bemenet != 0 && sor_bemenet < 4 && esemeny_bemenet != "")
            { 
                if (sor1_esemenyek == 3 && sor_bemenet == 1 || sor2_esemenyek == 3 && sor_bemenet == 2 || sor3_esemenyek == 3 && sor_bemenet == 3)
                {
                    alert("Az események megteltek!");
                }
                else
                {               
                    let esemeny = document.createElement("td");
                    esemeny.textContent = esemeny_bemenet;
                    let kivalasztott = document.getElementById("sor" + sor_bemenet);
                    kivalasztott.addEventListener("click",torles);

                    if (sor_bemenet == 1)
                    {
                        sor1_esemenyek++;
                        esemeny.setAttribute("id","cella1_" + sor1_esemenyek);
                        sor1_lista.push(esemeny_bemenet);
                    }
                    else if (sor_bemenet == 2)
                    {
                        sor2_esemenyek++;
                        esemeny.setAttribute("id","cella2_" + sor2_esemenyek);
                        sor2_lista.push(esemeny_bemenet);
                    }
                    else if (sor_bemenet == 3)
                    {
                        sor3_esemenyek++;
                        esemeny.setAttribute("id","cella3_" + sor3_esemenyek);
                        sor3_lista.push(esemeny_bemenet);
                    }

                    kivalasztott.appendChild(esemeny);
                }
            }
            else
            {
                alert("Nem jó adatok!");
            }
        }

        function torles()
        {
            let sor_id = this.getAttribute("id");
            let sor_szamok = document.getElementById(sor_id).children.length;
            let a_sor = document.getElementById(sor_id);

            while (sor_szamok != 0)
            {
                a_sor.removeChild(a_sor.lastChild);
                sor_szamok--;
            }

            if (sor_id == "sor1")
            {
                sor1_esemenyek = 0;
                sor1_lista = [];
            }
            else if (sor_id == "sor2")
            {
                sor2_esemenyek = 0;
                sor2_lista = [];
            }
            else if (sor_id == "sor3")
            {
                sor3_esemenyek = 0;
                sor3_lista = [];
            }
        }  
        
        function kereses()
        {
            let kereses_bemenet = document.getElementById("kereses_bemenet").value;

            if (sor1_lista.includes(kereses_bemenet) || sor2_lista.includes(kereses_bemenet) || sor3_lista.includes(kereses_bemenet))
            {
                alert("Talált!");
            }
            else
            {
                alert("Nem talált.");
            }
        }
    </script>
</body>
</html>