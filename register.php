<?php
require_once 'db.php';
session_start();

$error = '';
$success = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = trim($_POST['fullname'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (!empty($fullname) && !empty($email) && !empty($password)) {
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        
        if ($stmt->rowCount() > 0) {
            $error = "Бұл электронды пошта жүйеде тіркеліп қойған!";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $insert = $pdo->prepare("INSERT INTO users (fullname, phone, email, password) VALUES (?, ?, ?, ?)");
            if ($insert->execute([$fullname, $phone, $email, $hashed_password])) {
                $success = "Тіркелу сәтті өтті! Енді жүйеге кіре аласыз.";
            } else {
                $error = "Қате орын алды, қайта көріңіз.";
            }
        }
    } else {
        $error = "Барлық міндетті өрістерді толтырыңыз!";
    }
}
?>
<!DOCTYPE html>
<html lang="kk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicall - Тіркелу</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="d-flex align-items-center justify-content-center" style="min-height: 100vh;">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card p-5 bg-white shadow-lg rounded-4 border-0">
                    <div class="text-center mb-4">
                        <h2 class="fw-bold text-success mb-2">Жаңа аккаунт 🚀</h2>
                        <p class="text-muted small">Мәліметтеріңізді енгізіп тіркеліңіз</p>
                    </div>

                    <?php if (!empty($error)): ?>
                        <div class="alert alert-danger text-center rounded-3 py-2"><?php echo $error; ?></div>
                    <?php endif; ?>

                    <?php if (!empty($success)): ?>
                        <div class="alert alert-success text-center rounded-3 py-2"><?php echo $success; ?></div>
                    <?php endif; ?>

                    <form action="register.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label fw-medium text-secondary">Аты-жөні</label>
                            <input type="text" name="fullname" class="form-control" placeholder="Азамат Мұратұлы" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-medium text-secondary">Телефон нөмірі</label>
                            <input type="tel" name="phone" class="form-control" placeholder="+7 (777) 000-00-00" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-medium text-secondary">Электронды пошта</label>
                            <input type="email" name="email" class="form-control" placeholder="name@example.com" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-medium text-secondary">Құпия сөз</label>
                            <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                        </div>
                        <button type="submit" class="btn btn-success btn-lg w-100 rounded-pill mb-3 py-2 shadow-sm">Тіркелуді аяқтау</button>
                        
                        <div class="text-center mt-3">
                            <p class="text-muted small">Аккаунтыңыз бар ма? <a href="login.php" class="text-primary text-decoration-none fw-bold">Кіру</a></p>
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