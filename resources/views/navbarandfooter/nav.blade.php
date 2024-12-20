<style>
  nav{ background-color: rgb(162, 175, 255); }
  .btn-outline-primary{ color: azure; transition: 0.5s; border-color: azure;}
  .btn-outline-primary:hover{ color: rgb(31, 47, 84);background-color: azure; letter-spacing: 5px; transition: 0.5s; border-color: azure; }
  .nav-link { color: white; transition: 0.5s; }
  .nav-link:hover{ color: rgb(31, 47, 84); transition: 0.5s; border-bottom: 1px solid rgb(31, 47, 84); padding-bottom: 2px; }
  .dropdown-icon-btn {
      background: none;
      border: none;
      padding: 0;
      margin: 0;
      cursor: pointer;
    }
    .dropdown-icon-btn .bi {
      font-size: 24px;
      color: azure;
      transition: 0.5s;
    }
    .dropdown-icon-btn .bi:hover {
      color: rgb(31, 47, 84);
      font-size: 30px;
    }
    #navbarNav
    { margin-left: 15px; }
</style>
<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="btn btn-outline-primary rounded-pill" href="/">Comproller</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        @guest
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/">Kezdőlap</a>
        </li>
        @endguest
        @auth
          @role('hr','admin')
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/">Irányítópult</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Menedzsment
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/nyilvantartas">Nyilvántartás</a></li>
              <li><a class="dropdown-item" href="/muszakok-kezelese">Műszakok kezelése</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="/munkaido-nyilvantartas">Munkaidő nyilvántartás</a></li>
              <li><a class="dropdown-item" href="/szamfejtes">Számfejtés</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/hrdokumentumok">Dokumentumok</a>
          </li>
          @endrole
          @role('pu','admin')
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/iranyitopult">Irányítópult</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Pénzügyek
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/szamlazas">Számlázás</a></li>
              <li><a class="dropdown-item" href="/penzugyi-tranzakciok">Pénzügyi tranzakciók</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="/koltsegvetes">Költségvetés és tervezés</a></li>
              <li><a class="dropdown-item" href="/jelentesek">Jelentések és elemzések</a></li>
              <li><a class="dropdown-item" href="/adozas">Adózás és megfelelőség</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Befektetések és eszközök
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/befektetesek">Befektetéskezelés</a></li>
              <li><a class="dropdown-item" href="/eszkozmenedzsment">Készlet- és eszközmenedzsment</a></li>
              <li><a class="dropdown-item" href="/kockazatkezeles">Kockázatkezelés</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/pudokumentumok">Dokumentumok</a>
          </li>
          @endrole
        @endauth
      </ul>
    </div>
    @auth
    <div class="dropdown">
      <button class="dropdown-icon-btn" id="iconDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-arrow-down-circle"></i>
      </button>
      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="iconDropdown">
        <li><a class="dropdown-item" href="#">Profil</a></li>
        <li><a class="dropdown-item" href="#">Beállítások</a></li>
        <li><a class="dropdown-item" href="#">Kijelentkezés</a></li>
      </ul>
    </div>
    @endauth  
  </div>
</nav>
</body>
