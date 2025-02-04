<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
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
            padding: 15px;
            position: relative;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .menu {
            display: flex;
            gap: 15px;
        }
        .menu a {
            color: black;
            text-decoration: none;
            padding: 10px 20px;
            background-color: white;
            border-radius: 20px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .menu a:hover {
            background-color: #777d7c;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        .logo {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
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
    <nav>
        <div class="menu">
            @if(!session('isAdmin'))
            <a href="#">Kezdőlap</a>
            <a href="#">Kapcsolat</a>
            @endif
            @if(session('isAdmin'))
            <a href="#">Irányítópult</a>
            <a href="#">Események</a>
            <a href="#">Nyilvántartás</a>
            <a href="#">Munkaidő</a>
            <a href="#">Bérszámfejtés</a>
            <a href="#">Profil</a>
            <a href="#" onclick="kijelentkezes()">Kijelentkezés</a>
            @endif
        </div>
        <img src="bagoly.jpeg" alt="Logo" class="logo">
    </nav>
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
