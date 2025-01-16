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
  .clock {
    color: #c7d8ff;
    font-weight: bold;
    margin-left: auto;
  }
  .calendar-button {
    color: #c7d8ff;
    font-weight: bold;
    margin-right: auto;
    border: none;
    background: transparent;
    cursor: pointer;
  }
  .calendar-button:hover {
    color: #0d214e;
    letter-spacing: 5px;
    transition: 0.7s;
  }
  .modal-content {
    border-radius: 15px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
  }
  .calendar {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 5px;
    text-align: center;
    padding: 10px;
  }
  .calendar-header {
    font-weight: bold;
    background-color: #7568ff;
    color: #fff;
    padding: 5px;
    border-radius: 5px;
  }
  .calendar-day {
    padding: 8px;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s ease;
  }
  .calendar-day:hover {
    background-color: #c7d8ff;
  }
  .calendar-day.active {
    background-color: #0d214e;
    color: white;
  }

  @media (max-width: 768px) {
    .clock, .calendar-button {
      display: none;
    }
  }
</style>

<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <button class="calendar-button d-none d-md-block" data-bs-toggle="modal" data-bs-target="#calendarModal" id="dateButton"></button>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Navigáció váltása" id="navbarToggle">
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

    <div class="clock d-none d-md-block" id="clock"></div>
  </div>
</nav>

<div class="modal fade" id="calendarModal" tabindex="-1" aria-labelledby="calendarModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="calendarModalLabel">Naptár</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Bezárás"></button>
      </div>
      <div class="modal-body">
        <div id="calendar" class="calendar"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bezárás</button>
      </div>
    </div>
  </div>
</div>

<script>
  function updateClock() {
    const clockElement = document.getElementById('clock');
    const now = new Date();
    const hours = now.getHours().toString().padStart(2, '0');
    const minutes = now.getMinutes().toString().padStart(2, '0');
    const seconds = now.getSeconds().toString().padStart(2, '0');
    clockElement.textContent = `${hours}:${minutes}:${seconds}`;

    const dateButton = document.getElementById('dateButton');
    const date = now.toLocaleDateString('hu-HU');
    dateButton.textContent = date;
  }

  function generateCalendar() {
    const calendarElement = document.getElementById('calendar');
    const now = new Date();
    const currentMonth = now.getMonth();
    const currentYear = now.getFullYear();

    const firstDayOfMonth = new Date(currentYear, currentMonth, 1);
    const lastDayOfMonth = new Date(currentYear, currentMonth + 1, 0);
    
    const daysInMonth = lastDayOfMonth.getDate();
    const firstDay = firstDayOfMonth.getDay();

    const calendarDays = [];
    
    for (let i = 0; i < firstDay; i++) {
      calendarDays.push('');
    }

    for (let day = 1; day <= daysInMonth; day++) {
      calendarDays.push(day);
    }

    let calendarHTML = '<div class="calendar-header">V</div><div class="calendar-header">H</div><div class="calendar-header">K</div><div class="calendar-header">Sze</div><div class="calendar-header">Cs</div><div class="calendar-header">P</div><div class="calendar-header">Szo</div>';

    calendarDays.forEach((day, index) => {
      if (day === '') {
        calendarHTML += '<div class="calendar-day"></div>';
      } else {
        const isToday = day === now.getDate() && currentMonth === now.getMonth() && currentYear === now.getFullYear();
        calendarHTML += `<div class="calendar-day ${isToday ? 'active' : ''}">${day}</div>`;
      }
    });

    calendarElement.innerHTML = calendarHTML;
  }

  document.getElementById('navbarToggle').addEventListener('click', function () {
    const clockElement = document.getElementById('clock');
    const calendarButton = document.getElementById('dateButton');

    if (clockElement && calendarButton) {
      clockElement.style.display = 'none';
      calendarButton.style.display = 'none';
    }
  });

  setInterval(updateClock, 1000);
  updateClock();
  generateCalendar();
</script>
