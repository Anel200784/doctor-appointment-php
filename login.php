<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$login_message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login_email'])) {
    $email = $_POST['login_email'] ?? '';
    $login_message = "<div class='alert alert-success text-center'>Қош келдіңіз, $email!</div>";
}
?>
<!DOCTYPE html>
<html lang="kk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicall - Кіру</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="login-body bg-light d-flex align-items-center justify-content-center" style="min-height: 100vh;">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card p-4 bg-white shadow-sm border-0 rounded-4">
                    <div class="text-center mb-4">
                        <h2 class="fw-bold text-primary">Қош келдіңіз!</h2>
                        <p class="text-muted small">Жүйеге кіру үшін мәліметтеріңізді енгізіңіз</p>
                    </div>
                    
                    <?php echo $login_message; ?>

                    <form action="login.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label fw-medium">Электронды пошта</label>
                            <input type="email" name="login_email" class="form-control form-control-lg bg-light border-0" placeholder="name@example.com" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-medium">Құпия сөз</label>
                            <input type="password" name="login_password" class="form-control form-control-lg bg-light border-0" placeholder="••••••••" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill mb-3">Кіру</button>
                        
                        <div class="text-center">
                            <a href="index.php" class="text-secondary small text-decoration-none">← Басты бетке қайту</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>