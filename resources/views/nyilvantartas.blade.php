<!DOCTYPE html>
<html lang="hu">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="kepek/icon.png">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

        .modal 
        {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }

        .modal.hidden 
        {
            display: none !important;
        }

        .modal-content 
        {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            width: 400px;
            text-align: left;
            position: relative;
        }

        .close-button 
        {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 18px;
            cursor: pointer;
        }

        .hidden 
        {
            display: none;
        }

    </style>
</head>
<body>
    @include('navbarandfooter/nav')
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Összes dolgozó</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Felvétel</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">

        <div class="nyilvantartas_tarolo">
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
                                    <button type="button" class="btn btn-danger btn-sm col-1" onclick="torles({{ $Dolgozo->DolgozoID }})">-</button>
                                    <button type="button" class="btn btn-primary btn-sm col-1" onclick="lekeres({{ $Dolgozo->DolgozoID }})">i</button>
                                    <button type="button" class="btn btn-success btn-sm col-5" onclick="">Megjegyzés</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div id="modal" class="modal hidden">
                <div class="modal-content">
                    <span class="close-button" onclick="bezaras()">×</span>
                    <h2>Dolgozó adatai</h2>
                    <p><strong>Vezetéknév:</strong> <span id="modal_vezeteknev"></span></p>
                    <p><strong>Keresztnév:</strong> <span id="modal_keresztnev"></span></p>
                    <p><strong>Email:</strong> <span id="modal_email"></span></p>
                    <p><strong>Telefonszám:</strong> <span id="modal_telefonszam"></span></p>
                    <p><strong>Munkakör:</strong> <span id="modal_munkakor"></span></p>
                </div>
            </div>
        </div>

        </div>

        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
            ...
        </div>
        
    </div>
    @include('navbarandfooter/footer')
    <script>
        let ember_adatok = document.getElementById("ember_adatok");
        let ember_szamok = ember_adatok.children.length;
        for (let i = 0; i < ember_szamok; i++)
        {
            let az_id = "resz" + i;
            ember_adatok.children[i].setAttribute("id", az_id);
            
        }
        function torles(id)
        {
            if (!id) return;
            fetch('/dolgozok/' + id,
            {
                method: 'DELETE',
                headers:
                {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json',
                },
            })
            .then(function(response)
            {
                return response.json();
            })
            .then(function(data)
            {
                if (data.success)
                {
                    console.log("Dolgozó törölve:", id);
                    document.getElementById('resz' + id).remove();
                }
                else
                {
                    alert(data.message);
                }
            })
            .catch(function(error)
            {
                console.error("Hiba történt a törlés során:", error);
            });
        }
        function lekeres(id)
        {
            fetch('/dolgozok/' + id)
                .then(function(response)
                {
                    return response.json();
                })
                .then(function(data)
                {
                    console.log('Parsed data:', data);
                    
                    if (data.success)
                    {
                        document.getElementById("modal_vezeteknev").innerText = data.dolgozo.Vezeteknev;
                        document.getElementById("modal_keresztnev").innerText = data.dolgozo.Keresztnev;
                        document.getElementById("modal_email").innerText = data.dolgozo.Email;
                        document.getElementById("modal_telefonszam").innerText = data.dolgozo.Telefonszam;
                        document.getElementById("modal_munkakor").innerText = data.dolgozo.Munkakor;
                        let modal = document.getElementById("modal");
                        modal.classList.remove("hidden");
                        modal.style.display = "flex";
                    }
                    else
                    {
                        console.error('Sikertelen adatlekérés:', data.message);
                        alert("Hiba történt az adatok lekérése közben.");
                    }
                })
                .catch(function(error)
                {
                    console.error('Fetch hiba:', error);
                    alert("Hiba történt az adatok lekérése közben.");
                });
        }
        function bezaras()
        {
            let modal = document.getElementById("modal");
            modal.classList.add("hidden");
            modal.style.display = "none";
        }
    </script>
</body>
</html>