<!DOCTYPE html>
<html lang="hu">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="kepek/icon.png">
    <title>Comproller - Főoldal</title>
</head>
<body>
    @include('navbarandfooter/nav')
    <!DOCTYPE html>
<html lang="hu">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="kepek/icon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Comproller - Főoldal</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Arial", sans-serif;
        }

        body {
            background-image: url('{{ asset('kepek/hatter.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            width: 100%;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            width: 100%;
            background-color: #7568ff;
            border-bottom: #9d94ff 10px solid;
        }

        /* A dropdown gomb bal oldalon történő elhelyezése mobil és tablet nézetekben */
        .navbar-nav {
            margin-left: 0;
        }

        /* Dropdown button alignment on mobile */
        @media (max-width: 768px) {
            .navbar .nav-item {
                margin-left: 0; /* Align to the left */
            }
        }

        .navbar .nav-link {
            color: #c7d8ff;
            font-weight: bold;
        }

        .navbar .nav-link:hover {
            color: #0d214e;
            font-weight: bold;
            letter-spacing: 5px;
            transition: 0.7s;
        }

        .wrapper {
            position: relative;
            width: 400px;
            height: auto;
            background: rgba(243, 238, 238, 0.9);
            border-radius: 20px;
            box-shadow: 0 0 50px rgba(0, 0, 0, 0.1);
            padding: 40px;
            margin: 220px auto 20px auto;
        }

        h2 {
            font-size: 30px;
            color: black;
            text-align: center;
        }

        .input-group {
            position: relative;
            margin: 30px 0;
            border-bottom: 2px solid grey;
        }

        .input-group label {
            position: absolute;
            top: 50%;
            left: 5px;
            transform: translateY(-50%);
            font-size: 16px;
            color: black;
            pointer-events: none;
            transition: top 0.5s;
        }

        .input-group input {
            width: 100%;
            height: 40px;
            font-size: 16px;
            color: black;
            padding: 0 5px;
            background: transparent;
            border: none;
            outline: none;
        }

        .input-group input:focus ~ label,
        .input-group input:valid ~ label {
            top: -5px;
        }

        .jelszo-icon {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 20px;
            cursor: pointer;
        }

        button {
            position: relative;
            width: 100%;
            height: 40px;
            font-size: 16px;
            color: black;
            cursor: pointer;
            border-radius: 30px;
            border: none;
            outline: none;
            background-color: white;
            border: 2px solid blue;
        }

        button:hover {
            background-color: rgb(222, 230, 233);
        }

        footer {
            width: 100%;
            background-color: #7568ff;
            text-align: center;
            color: #fff;
            padding: 10px 0;
            margin-top: auto;
        }
    </style>
</head>
<body>
    @include('navbarandfooter/nav')
    <div class="wrapper">
        <div class="form-wrapper sign-in">
            <form action="">
                <h2>Bejelentkezés</h2>
                <div class="input-group">
                    <input type="text" id="b_nev" required>
                    <label>Felhasználónév</label>
                </div>
                <div class="input-group">
                    <input type="password" id="password-signin" required>
                    <label>Jelszó</label>
                    <img src="{{ asset('kepek/szem_be.png') }}" onclick="megnez('password-signin', this)" class="jelszo-icon">
                </div>
                <button type="submit">Bejelentkezés</button>
            </form>
        </div>
    </div>
    @include('navbarandfooter/footer')
    <script>
        let megnyomva = false;
        function megnez(passwordId, iconElement) {
            const passwordField = document.getElementById(passwordId);
            if (!megnyomva) {
            passwordField.type = 'text';
            iconElement.src = '{{ asset('kepek/szem_ki.png') }}';
            megnyomva = true;
            } else {
            passwordField.type = 'password';
            iconElement.src = '{{ asset('kepek/szem_be.png') }}';
            megnyomva = false;
            }
        }
    </script>
</body>
</html>


    @include('navbarandfooter/footer')
</body>
</html>
