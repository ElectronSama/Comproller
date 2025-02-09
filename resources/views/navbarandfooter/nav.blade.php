<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        nav {
            background-color: lightblue;
            color: black;
            font-weight: bold;
            padding: 10px 20px;
        }
        .navbar-brand img {
            width: 50px;
            height: 50px;
            object-fit: cover;
        }
        .navbar-toggler {
            border: none;
            background: none;
        }
        .navbar-toggler:focus {
            outline: none;
            box-shadow: none;
        }
        .navbar-nav .nav-link {
            color: black;
            text-decoration: none;
            padding: 10px 20px;
            background-color: white;
            border-radius: 20px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin: 5px 0;
        }
        .navbar-nav .nav-link:hover {
            background-color: #777d7c;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        main {
            flex: 1;
            padding: 20px;
            text-align: center;
        }
        footer {
            background-color: lightblue;
            color: black;
            font-weight: bold;
            text-align: center;
            padding: 10px;
            width: 100%;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto"> 
                    @if(!session('isAdmin'))
                    <li class="nav-item">
                        <a class="nav-link" href="/">Kezdőlap</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact">Kapcsolat</a>
                    </li>
                    @endif
                    @if(session('isAdmin'))
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard">Irányítópult</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/events">Események</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/registry">Nyilvántartás</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/worktime">Munkaidő</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/payroll-calculation">Bérszámfejtés</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/profile">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="kijelentkezes()">Kijelentkezés</a>
                    </li>
                    @endif
                </ul>
            </div>
            <a class="navbar-brand ms-auto" href="#">
                <img src="kepek/logo.svg" alt="Logo" class="logo">
            </a>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script>
        function kijelentkezes() 
        {
            fetch('{{ route('logout') }}', 
            {
                method: 'POST',
                headers: 
                {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                }
            })
            .then(function(valasz) 
            {
                if (valasz.ok) 
                {
                    window.location.href = '/';
                } 
                else 
                {
                    alert('Kijelentkezési hiba!');
                }
            })
            .catch(function(hiba) 
            {
                console.error('Hiba a kijelentkezés során:', hiba);
            });
        }
    </script>
</body>
</html>
