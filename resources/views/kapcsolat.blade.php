<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="kepek/icon.png">
    <title>Comproller - Kapcsolat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('navbarandfooter/nav')
    <main class="container my-5">
        <section class="contact">
            <div class="container mt-5">
                <h1 class="text-center mb-4">Kapcsolat</h1>
                <div class="row g-4">
                    <div class="col-lg-8">
                        <form id="kapcsolat-form">
                            <div class="mb-3"> 
                                <input type="hidden" name="access_key" value="8930859f-cfe1-4901-a61e-2015658720db">
                                <input type="hidden" name="subject" value="New Submission from Web3Forms">
                                <label for="name" class="form-label fw-bold">Név:</label>
                                <input type="text" id="name" name="name" class="form-control form-control-lg" placeholder="Írja be a nevét" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label fw-bold">E-mail cím:</label>
                                <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="Írja be az e-mail címét" required>
                            </div>
                            <div class="mb-4">
                                <label for="message" class="form-label fw-bold">Üzenet:</label>
                                <textarea id="message" name="message" class="form-control form-control-lg" placeholder="Írja be az üzenetét" rows="5" required></textarea>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-dark btn-lg">Küldés</button>
                            </div>
                            <div id="result" class="mt-3" style="display: none;"></div>
                        </form>
                    </div>
                    <div class="col-lg-4">
                        <div class="card shadow h-100">
                            <div class="card-body p-4">
                                <h3 class="card-title mb-4">Elérhetőségeink</h3>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex align-items-center">
                                        <strong class="me-2">Facebook:</strong>
                                        <a href="https://facebook.com/pumpkinstudio" class="text-decoration-none">facebook.com/pumpkinstudio</a>
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <strong class="me-2">Instagram:</strong>
                                        <a href="https://instagram.com/pumpkinstudio" class="text-decoration-none">instagram.com/pumpkinstudio</a>
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <strong class="me-2">GitHub:</strong>
                                        <a href="https://github.com/ElectronSama/comproller" class="text-decoration-none">github.com/ElectronSama/comproller</a>
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <strong class="me-2">Email:</strong>
                                        <a href="mailto:info@pumpkinstudio.com" class="text-decoration-none">info@pumpkinstudio.com</a>
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <strong class="me-2">Telefon/Viber/Whatsapp:</strong>
                                        <a href="tel:+36123456789" class="text-decoration-none">+36 1 234 5678</a>
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <strong class="me-2">Telegram:</strong>
                                        <a href="https://t.me/comproller" class="text-decoration-none">t.me/comproller</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @include('navbarandfooter/footer')

    <script>
        const form = document.getElementById('kapcsolat-form');
        const eredmeny = document.getElementById('result');

        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(form);
            const jsonData = JSON.stringify(Object.fromEntries(formData));

            eredmeny.style.display = "block";
            eredmeny.className = "alert alert-info";
            eredmeny.innerHTML = "Küldés folyamatban...";

            fetch('https://api.web3forms.com/submit', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: jsonData
            })
            .then(async (response) => {
                const data = await response.json();
                if (response.status === 200) {
                    eredmeny.className = "alert alert-success";
                    eredmeny.innerHTML = "Az üzenetét sikeresen elküldtük! Hamarosan felvesszük Önnel a kapcsolatot.";
                } else {
                    eredmeny.className = "alert alert-danger";
                    eredmeny.innerHTML = `Hiba történt: ${data.message}`;
                }
            })
            .catch((error) => {
                console.error('Hiba:', error);
                eredmeny.className = "alert alert-danger";
                eredmeny.innerHTML = "Hiba történt az üzenet elküldésekor. Próbálja újra később.";
            })
            .finally(() => {
                form.reset();
                setTimeout(() => {
                    eredmeny.style.display = "none";
                }, 5000);
            });
        });
    </script>
</body>
</html>
