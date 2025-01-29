<!DOCTYPE html>
<html lang="hu">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="kepek/icon.png">
    <meta charset="UTF-8">
    <title>Comproller - Profil</title>
    <style>

        #leiras
        {

            background-image: url("kepek/profil_leiras.jpg");
            background-color: rgba(255, 255, 255, 0.600);
            background-blend-mode: overlay;
            border-radius: 10px;
            font-size: 20px;
            padding: 60px;
            color: black;
            border: 2px solid black;
            display: grid;
            justify-items: center;
            align-items: center;

        }

        #a_form
        {

             display: none;

        }

        #lprofil 
        {
            width: 100px;
            height: 100px;
            display: block;
            margin: 0 auto;
            object-fit: cover;
            position: relative;
            border-radius: 30px;
            transition: transform (1.1);
        }

        #lprofil:hover
        {

            transform: scale(1.1);

        }


        p
        {

            border: 2px solid black;
            box-shadow: 10px 5px 5px black;
            text-align: center;

        }

    </style>
</head>
<body>

    @include('navbarandfooter/nav')

        <div id="leiras">

            <div>

                <h1>Profil adatok:</h1><br>

                <img src="kepek/icon.PNG" id="lprofil"><br>

                <p id="lnemek">-</p><br>

                <p id="lemailcim">-</p><br>

                <p id="lprofil_leiras">-</p><br>

                <p id="llink1">-</p><br>

                <p id="llink2">-</p><br>

                <p id="llink3">-</p>

            </div>

            <button type="button" onclick="megjelenit()" id="modositos_gomb">Módositás</button>

            <form id="a_form">

                <label>Profil kép:</label><br>
                <input type="file" accept="image/*" id="profilkep"><br>

                <label>Nem:</label><br>

                <select id="nemek">

                    <option value="-">--Válassz nemet--</option><br>
                    <option value="Férfi">Férfi</option><br>
                    <option value="Nő">Nő</option><br>
                    <option value="Egyéb">Egyéb</option><br>

                </select><br>

                <label>Email cím:</label><br>
                <input type="email" placeholder="valaki@gmail.com" id="emailcim"><br>

                <label>Profil leírás:</label><br>
                <textarea placeholder="Profil leírás ide... (opcionális)" id="profil_leiras" rows="4" cols="50"></textarea><br>

                <label>Linkek:</label><br>
                <input type="url" placeholder="Első link... (opcionális)" id="link1"><br>
                <input type="url" placeholder="Második link... (opcionális)" id="link2"><br>
                <input type="url" placeholder="Harmadik link... (opcionális)" id="link3"><br>

                <button type="button" onclick="kvegignez()">Kép mentése</button>
                <button type="button" onclick="vegignez()">Mentés</button>

            </form>

        </div>

    @include('navbarandfooter/footer')

<script>

    window.onload = function()
    {
        if (sessionStorage.getItem("profilkep")) 
        {
            document.getElementById("lprofil").src = sessionStorage.getItem("profilkep");
        }

        if (sessionStorage.getItem("profil_leiras")) 
        {
            document.getElementById("lprofil_leiras").textContent = sessionStorage.getItem("profil_leiras");
        }

        if (sessionStorage.getItem("nemek")) 
        {
            document.getElementById("lnemek").textContent = sessionStorage.getItem("nemek");
        }

        if (sessionStorage.getItem("emailcim")) 
        {
            document.getElementById("lemailcim").textContent = sessionStorage.getItem("emailcim");
        }

        if (sessionStorage.getItem("link1")) 
        {
            document.getElementById("llink1").textContent = sessionStorage.getItem("link1");
        }

        if (sessionStorage.getItem("link2")) 
        {
            document.getElementById("llink2").textContent = sessionStorage.getItem("link2");
        }

        if (sessionStorage.getItem("link3")) 
        {
            document.getElementById("llink3").textContent = sessionStorage.getItem("link3");
        }
    };

    let megjelenitve = false;

    function megjelenit()
    {

        if (megjelenitve == false)
        {
            let a_form = document.getElementById("a_form");

            a_form.style.display = "grid";

            let modositos_gomb = document.getElementById("modositos_gomb");

            modositos_gomb.textContent = "Vissza";

            megjelenitve = true;
        }
        else if (megjelenitve == true)
        {

            a_form = document.getElementById("a_form");

            a_form.style.display = "none";

            modositos_gomb = document.getElementById("modositos_gomb");

            modositos_gomb.textContent = "Módositás";

            megjelenitve = false;

        }

    }

    function kvegignez() 
    {
        let profilkep = document.getElementById("profilkep");
        
        let file = profilkep.files[0];

        if (!file) 
        {
            alert("Nincs kiválasztva fájl profilképhez!");
            return;
        }

        let olvaso = new FileReader();
        
        olvaso.onload = function (i) 
        {
            document.getElementById("lprofil").src = i.target.result;
            sessionStorage.setItem("profilkep", i.target.result);

            alert("Profilkép frissítve!");
        };

        olvaso.readAsDataURL(file);

    }

    function vegignez()
    {

            let nemek = document.getElementById("nemek");
            let emailcim = document.getElementById("emailcim");
            let profil_leiras = document.getElementById("profil_leiras");
            let link1 = document.getElementById("link1");
            let link2 = document.getElementById("link2");
            let link3 = document.getElementById("link3");

            let lnemek = document.getElementById("lnemek");
            let lemailcim = document.getElementById("lemailcim");
            let lprofil_leiras = document.getElementById("lprofil_leiras");
            let llink1 = document.getElementById("llink1");
            let llink2 = document.getElementById("llink2");
            let llink3 = document.getElementById("llink3");

            if (nemek.value == "-" || !emailcim.value.includes("@"))
            {

                alert("Hiányos adatok!");
                return;

            }
            else
            {

                sessionStorage.setItem("nemek",nemek.value);
                lnemek.textContent = nemek.value;
                sessionStorage.setItem("emailcim",emailcim.value);
                lemailcim.textContent = emailcim.value;

                if (profil_leiras != "")
                {

                    sessionStorage.setItem("profil_leiras",profil_leiras.value);
                    lprofil_leiras.textContent = profil_leiras.value;
                    
                }

                if (link1 != "" && link1.value.includes("."))
                {

                    sessionStorage.setItem("link1",link1.value);
                    llink1.textContent = link1.value;

                }

                if (link2 != "" && link2.value.includes("."))
                {

                    sessionStorage.setItem("link2",link2.value);
                    llink2.textContent = link2.value;

                }

                if (link3 != "" && link3.value.includes("."))
                {

                    sessionStorage.setItem("link3",link3.value);
                    llink3.textContent = link3.value;

                }

                alert("Siker!");

            }

    }

    a_form.reset();

</script>

</body>
</html>
