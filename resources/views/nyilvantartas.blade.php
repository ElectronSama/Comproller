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
    <ul class="nav nav-tabs m-5" id="myTab" role="tablist">
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
                
                        <input type="hidden" id="modal_id">
                        <p><strong>Vezetéknév:</strong> <input type="text" id="modal_vezeteknev"></p>
                        <p><strong>Keresztnév:</strong> <input type="text" id="modal_keresztnev"></p>
                        <p><strong>Email:</strong> <input type="email" id="modal_email"></p>
                        <p><strong>Telefonszám:</strong> <input type="text" id="modal_telefonszam"></p>
                        <p><strong>Munkakör:</strong> <input type="text" id="modal_munkakor"></p>
                
                        <button onclick="mentes()">Mentés</button>
                    </div>
                </div>                
            </div>

        </div>

        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
            <form action="feltoltes.php" method="POST">
                @csrf
                <div class="row m-5">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Keresztnév</label>
                        <input type="text" name="keresztnev_input" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Vezetéknév</label>
                        <input type="text" name="vezeteknev_input" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Születési dátum</label>
                        <input type="date" name="datum_input" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Anyja neve</label>
                        <input type="text" name="anyu_input" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">TAJ szám</label>
                        <input type="text" name="tajszam_input" class="form-control" required pattern="[0-9]{9}" title="A TAJ számnak pontosan 9 számjegyből kell állnia.">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Adószám</label>
                        <input type="text" name="adoszam_input" class="form-control" required pattern="[0-9]{8}-[0-9]{1}-[0-9]{2}" title="Az adószám formátuma: 12345678-1-12">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Bankszámlaszám</label>
                        <input type="text" name="szamla_input" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Cím</label>
                        <input type="text" name="cim_input" class="form-control" required>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="checkbox" id="ugyanazCim" onchange="copyAddress()">
                            <label class="form-check-label" for="ugyanazCim">
                                Megegyezik a tartózkodási hely a címmel
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Állampolgárság</label>
                        <select name="allam_input" class="form-control" required>
                            <option value="magyar">Magyar</option>
                            <option value="román">Román</option>
                            <option value="szlovák">Szlovák</option>
                            <option value="osztrák">Osztrák</option>
                            <option value="horvát">Horvát</option>
                            <option value="szerb">Szerb</option>
                            <option value="szlovén">Szlovén</option>
                            <option value="ukrán">Ukrán</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tartózkodási hely</label>
                        <input type="text" name="tartozkodas_input" class="form-control" id="tartozkodasiHely" required>
                    </div>
                    <script>
                        function copyAddress() {
                            const checkbox = document.getElementById('ugyanazCim');
                            const tartozkodasiHely = document.getElementById('tartozkodasiHely');
                            const cim = document.getElementsByName('cim_input')[0];
                            
                            if (checkbox.checked) {
                                tartozkodasiHely.value = cim.value;
                                tartozkodasiHely.disabled = true;
                                
                                cim.addEventListener('input', function() {
                                    tartozkodasiHely.value = cim.value;
                                });
                            } else {
                                tartozkodasiHely.disabled = false;
                                cim.removeEventListener('input', function() {
                                    tartozkodasiHely.value = cim.value;
                                });
                            }
                        }
                    </script>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Személyi igazolvány szám</label>
                        <input type="text" name="szemelyi_input" class="form-control" required pattern="[0-9]{11}" title="A személyi számnak pontosan 11 számjegyből kell állnia.">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email_input" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Telefonszám</label>
                        <div class="input-group">
                            <select class="form-select" name="CountryCode" style="max-width: 120px;">
                                <option value="+36">+36 (HU)</option>
                                <option value="+40">+40 (RO)</option>
                                <option value="+421">+421 (SK)</option>
                                <option value="+43">+43 (AT)</option>
                                <option value="+385">+385 (HR)</option>
                                <option value="+381">+381 (RS)</option>
                                <option value="+386">+386 (SI)</option>
                                <option value="+380">+380 (UA)</option>
                            </select>
                            <input type="tel" name="telefon_input" class="form-control" required 
                                   pattern="[0-9]{9}" title="Kérem adjon meg 9 számjegyet">
                        </div>
                        <small class="form-text text-muted">Példa: 301234567</small>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Munkakör</label>
                        <input type="text" name="munkakor_input" class="form-control" required>
                    </div>
                </div>
                <div class="m-5 p-1">
                    <button type="submit" class="btn btn-primary">Mentés</button>
                </div>
            </form>
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
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json',
                }
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
                    document.getElementById("sor_" + id).remove();
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
                    console.log('Lekért adatok:', data);
                    if (data.success) 
                    {
                        document.getElementById("modal_id").value = id;
                        document.getElementById("modal_vezeteknev").value = data.dolgozo.Vezeteknev;
                        document.getElementById("modal_keresztnev").value = data.dolgozo.Keresztnev;
                        document.getElementById("modal_email").value = data.dolgozo.Email;
                        document.getElementById("modal_telefonszam").value = data.dolgozo.Telefonszam;
                        document.getElementById("modal_munkakor").value = data.dolgozo.Munkakor;
    
                        let modal = document.getElementById("modal");
                        modal.classList.remove("hidden");
                        modal.style.display = "flex";
                    } 
                    else 
                    {
                        alert("Hiba történt az adatok lekérése közben.");
                    }
                })
                .catch(function(error) 
                {
                    console.error('Hiba:', error);
                    alert("Hiba történt az adatok lekérése közben.");
                });
        }
    
        function mentes() 
        {
            let id = document.getElementById("modal_id").value;
            let vezeteknev = document.getElementById("modal_vezeteknev").value;
            let keresztnev = document.getElementById("modal_keresztnev").value;
            let email = document.getElementById("modal_email").value;
            let telefonszam = document.getElementById("modal_telefonszam").value;
            let munkakor = document.getElementById("modal_munkakor").value;
    
            fetch('/dolgozok/update', 
            
            {
                method: "POST",
                headers: 
                {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    id: id,
                    vezeteknev: vezeteknev,
                    keresztnev: keresztnev,
                    email: email,
                    telefonszam: telefonszam,
                    munkakor: munkakor
                })
            })
            .then(function(response) 
            {
                return response.json();
            })
            .then(function(data) 
            {
                if (data.success) 
                {
                    alert("Adatok sikeresen frissítve!");
                    document.getElementById("modal").classList.add("hidden");
                    location.reload();
                } 
                else 
                {
                    alert("Hiba történt: " + data.error);
                }
            })
            .catch(function(error) 
            {
                console.error("Hiba:", error);
            });
        }
    
        function bezaras() 
        {
            document.getElementById("modal").classList.add("hidden");
        }

    </script>
</body>
</html>