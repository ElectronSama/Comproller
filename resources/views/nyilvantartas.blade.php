<!DOCTYPE html>
<html lang="hu">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="kepek/icon.png">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Comproller - Nyilvántartás</title>
    <style>

        #a_form
        {

            padding : 50px;

        }

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

        .terkozutana 
        {
            margin-bottom: 20px;
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


        <div class="container mt-5">

            <form id="employeeForm" method="POST" action="{{ route('registry.store') }}">
                @csrf
                <div class="row g-3">
                    <!-- Keresztnév, Vezetéknév, Születési Dátum -->
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="Keresztnev" name="Keresztnev" placeholder="" required maxlength="255">
                            <label for="Keresztnev">Keresztnév</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="Vezeteknev" name="Vezeteknev" placeholder="" required maxlength="255">
                            <label for="Vezeteknev">Vezetéknév</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="Nem" name="Nem" placeholder="" required maxlength="255">
                            <label for="Nem">Nem</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="Szuletesi_datum" name="Szuletesi_datum" min="1900-01-01" max="2026-01-01" required>
                            <label for="Szuletesi_datum">Születési dátum</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="Szuletesi_hely" name="Szuletesi_hely" placeholder="" required>
                            <label for="Szuletesi_datum">Születési hely</label>
                        </div>
                    </div>

                    <!-- Anyja neve, TAJ szám, Adószám -->
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="Anyja_neve" name="Anyja_neve" placeholder="" required maxlength="255">
                            <label for="Anyja_neve">Anyja neve</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="Tajszam" name="Tajszam" placeholder="" pattern="\d{9}" required>
                            <label for="Tajszam">Társadalombiztosítási Azonosító Jel</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="Adoszam" name="Adoszam" placeholder="" pattern="\d{10}" required>
                            <label for="Adoszam">Adóazonosító</label>
                        </div>
                    </div>

                    <!-- Bankszámlaszám, Email, Alapórabér -->
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="Bankszamlaszam" name="Bankszamlaszam" placeholder="" required maxlength="24">
                            <label for="Bankszamlaszam">Bankszámlaszám</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="Email" name="Email" placeholder="" required maxlength="255">
                            <label for="Email">Email</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="Alaporaber" name="Alaporaber" placeholder="" required min="0" step="0.01">
                            <label for="Alaporaber">Alapórabér</label>
                        </div>
                    </div>

                    <!-- Telefonszám nemzetközi -->
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input type="tel" class="form-control" id="Telefon" name="Telefon" placeholder="" required>
                            <label for="Telefon">Telefonszám</label>
                        </div>
                    </div>

                    <!-- Irányítószám, Település, Utca/Út -->
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="Irsz" name="Irsz" placeholder="" required maxlength="4">
                            <label for="Irsz">Irányítószám</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="Telepules" name="Telepules" placeholder="" required maxlength="255">
                            <label for="Telepules">Település</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="Utca_ut" name="Utca_ut" placeholder="" required maxlength="255">
                            <label for="Utca_ut">Utca/Út</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="Tartozkodasi_hely" name="Tartozkodasi_hely" placeholder="" required maxlength="255">
                            <label for="Tartozkodasi_hely">Tartózkodási hely</label>
                        </div>
                    </div>

                    <!-- Házszám, Állampolgárság, Műszak -->
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="Hazszam" name="Hazszam" placeholder="" required maxlength="10">
                            <label for="Hazszam">Házszám</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <select class="form-select" id="Allampolgarsag" name="Allampolgarsag" required>
                                <option value="" disabled selected>Válasszon...</option>
                                <option value="magyar">Magyar</option>
                                <option value="angol">Angol</option>
                                <option value="német">Német</option>
                            </select>
                            <label for="Allampolgarsag">Állampolgárság</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <select class="form-select" id="Muszak" name="Muszak" required>
                                <option value="" disabled selected>Válasszon...</option>
                                <option value="reggeli">Reggeli műszak</option>
                                <option value="deli">Déli műszak</option>
                                <option value="esti">Esti műszak</option>
                            </select>
                            <label for="Muszak">Műszak</label>
                        </div>
                    </div>

                    <!-- Munkakör -->
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="Munkakor" name="Munkakor" placeholder="" required maxlength="255">
                            <label for="Munkakor">Munkakör</label>
                        </div>
                    </div>

                    <!-- Megjegyzés -->
                    <div class="col-md-12">
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="Megjegyzes" name="Megjegyzes" placeholder="" style="height: 100px;"></textarea>
                            <label for="Megjegyzes">Megjegyzés</label>
                        </div>
                    </div>

                    <!-- Submit gomb -->
                    <div class="terkozutana text-start col-12">
                        <button type="submit" class="btn btn-primary btn-lg">Regisztráció</button>
                    </div>
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

            window.location.href = '/registry'
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
                    window.location.href = '/registry';
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

        function oldal_frissites()
        {

            window.location.href = '/registry';

        }

    </script>
</body>
</html>