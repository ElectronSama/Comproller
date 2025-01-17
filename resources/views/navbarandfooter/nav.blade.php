<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
  .navbar {
    background-color: #7568ff;
    border-bottom: #9d94ff 10px solid;
    }
    .nav-link {
        color: #c7d8ff;
        font-weight: bold;
    }
    .nav-link:hover {
        color: #0d214e;
        font-weight: bold;
        letter-spacing: 5px;
        transition: 0.7s;
    }
</style>
<nav class="navbar navbar-expand-lg justify-content-center">
  <div class="container-fluid">
    <div class="row w-100">
      <div class="col text-start">
      </div>
      <div class="col text-center">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
          <ul class="navbar-nav">
            @guest
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="/">Kezdőlap</a>
            </li>
            @endguest
            @auth
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
            @endauth
            @guest
            <li class="nav-item">
              <a class="nav-link" href="/contact">Kapcsolat</a>
            </li>
            @endguest
            @auth
            <li class="nav-item">
              <a class="nav-link" href="/profile">Profil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Kijelentkezés</a>
            </li>
            @endauth
          </ul>
        </div>
      </div>
      <div class="col text-end">
      </div>
    </div>
  </div>
</nav>
