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
                        <form id="emailForm" action="https://api.web3forms.com/submit" method="POST" class="p-4 border rounded shadow-sm bg-light">
                            <input type="hidden" name="access_key" value="8930859f-cfe1-4901-a61e-2015658720db">
                            <input type="hidden" name="redirect" value="false">
                            <input type="hidden" name="message" value="">
                            
                            <div class="mb-3">
                                <label for="name" class="form-label">Név:</label>
                                <input type="text" id="name" name="name" class="form-control" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail:</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="subject" class="form-label">Tárgy:</label>
                                <select id="subject" name="subject" class="form-select" required>
                                    <option value="Általános érdeklődés">Általános érdeklődés</option>
                                    <option value="Technikai támogatás">Technikai támogatás</option>
                                    <option value="Visszajelzés">Visszajelzés</option>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label for="message" class="form-label">Üzenet:</label>
                                <textarea id="message" name="message" class="form-control" rows="4" required></textarea>
                            </div>
                            
                            <input type="hidden" id="fromName" name="from_name">
                            
                            <button type="submit" class="btn btn-primary">Küldés</button>
                        </form>
                        <script>
                            document.getElementById('emailForm').addEventListener('submit', function(event) {
                                const nameInput = document.getElementById('name').value;
                                document.getElementById('fromName').value = nameInput;
                            });
                        </script>
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
</body>
</html>
