<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'db.php';
session_start();

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (!empty($email) && !empty($password)) {
        try {
            $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch();

            if ($user) {
                if (password_verify($password, $user['password'])) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_name'] = $user['fullname'];
                    $_SESSION['user_email'] = $user['email'];
                    
                    header("Location: index.php");
                    exit();
                } else {
                    $error = "Құпия сөз қате!";
                }
            } else {
                $error = "Бұл электронды пошта жүйеде табылмады!";
            }
        } catch (PDOException $e) {
            $error = "Дерекқор қатесі: " . $e->getMessage();
        }
    } else {
        $error = "Барлық өрістерді толтырыңыз!";
    }
}
?>
<!DOCTYPE html>
<html lang="kk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicall - Кіру</title>
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
                        <h2 class="fw-bold text-primary mb-2">Қош келдіңіз! 👋</h2>
                        <p class="text-muted small">Жүйеге кіру үшін мәліметтеріңізді енгізіңіз</p>
                    </div>
                    
                    <?php if (!empty($error)): ?>
                        <div class="alert alert-danger text-center rounded-3 py-2"><?php echo $error; ?></div>
                    <?php endif; ?>

                    <form action="login.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label fw-medium text-secondary">Электронды пошта</label>
                            <input type="email" name="email" class="form-control" placeholder="name@example.com" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-medium text-secondary">Құпия сөз</label>
                            <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill mb-3 py-2 shadow-sm">Кіру</button>
                        
                        <div class="text-center mt-3">
                            <p class="text-muted small">Аккаунтыңыз жоқ па? <a href="register.php" class="text-success text-decoration-none fw-bold">Тіркелу</a></p>
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