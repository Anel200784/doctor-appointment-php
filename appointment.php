<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require_once 'db.php';

// Дәрігердің аты мен мамандығын аламыз
$doctor_name = $_GET['doctor'] ?? 'Айдос Мұратұлы';
$doctor_spec = $_GET['spec'] ?? 'Терапевт';
$full_doctor = "Др. " . $doctor_name . " (" . $doctor_spec . ")";

$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patient_name = trim($_POST['patient_name'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $appointment_date = $_POST['appointment_date'] ?? '';
    $appointment_time = $_POST['appointment_time'] ?? '';
    
    if (!empty($patient_name) && !empty($appointment_date) && !empty($appointment_time)) {
        try {
            // Егер қолданушы жүйеге кірген болса оның ID-ін аламыз, кірмесе 0 болады
            $user_id = $_SESSION['user_id'] ?? 0;

            $stmt = $pdo->prepare("INSERT INTO appointments (user_id, doctor_name, appointment_date, appointment_time) VALUES (?, ?, ?, ?)");
            $stmt->execute([$user_id, $full_doctor, $appointment_date, $appointment_time]);

            $message = "<div class='alert alert-success text-center mb-4'>Құттықтаймыз, <strong>" . htmlspecialchars($patient_name) . "</strong>! Сіз <strong>$full_doctor</strong> қабылдауына <strong>$appointment_date</strong> күні сағат <strong>$appointment_time</strong> сәтті жазылдыңыз.</div>";
        } catch (PDOException $e) {
            $message = "<div class='alert alert-danger text-center mb-4'>Қате орын алды: " . $e->getMessage() . "</div>";
        }
    } else {
        $message = "<div class='alert alert-danger text-center mb-4'>Барлық өрістерді толтырыңыз!</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="kk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicall - Қабылдауға жазылу</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">

    <nav class="navbar navbar-light bg-white shadow-sm py-3 mb-5">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="index.php">🏥 Medicall</a>
            <div>
                <a class="btn btn-outline-primary btn-sm rounded-pill px-3 me-2" href="my_appointments.php">Менің жазылымдарым</a>
                <a class="btn btn-outline-secondary btn-sm rounded-pill px-3" href="index.php">Артқа қайту</a>
            </div>
        </div>
    </nav>

    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card p-4 bg-white shadow-sm border-0 rounded-4">
                    <div class="text-center mb-4">
                        <h3 class="fw-bold text-dark">Қабылдауға жазылу</h3>
                        <p class="text-muted">Таңдалған маман: <strong class="text-primary"><?php echo htmlspecialchars($full_doctor); ?></strong></p>
                    </div>

                    <?php echo $message; ?>

                    <form action="appointment.php?doctor=<?php echo urlencode($doctor_name); ?>&spec=<?php echo urlencode($doctor_spec); ?>" method="POST">
                        <div class="mb-3">
                            <label class="form-label fw-medium">Пациенттің аты-жөні</label>
                            <input type="text" name="patient_name" class="form-control form-control-lg bg-light border-0" placeholder="Толық аты-жөніңізді жазыңыз" required value="<?php echo htmlspecialchars($_SESSION['user_name'] ?? ''); ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-medium">Байланыс телефон нөмірі</label>
                            <input type="tel" name="phone" class="form-control form-control-lg bg-light border-0" placeholder="+7 (777) 000-00-00" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-medium">Қабылдау күні</label>
                                <input type="date" name="appointment_date" class="form-control form-control-lg bg-light border-0" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-medium">Қабылдау уақыты</label>
                                <select name="appointment_time" class="form-select form-select-lg bg-light border-0" required>
                                    <option value="" selected disabled>Уақытты таңдаңыз</option>
                                    <option value="09:00">09:00 - 09:30</option>
                                    <option value="10:00">10:00 - 10:30</option>
                                    <option value="11:00">11:00 - 11:30</option>
                                    <option value="14:00">14:00 - 14:30</option>
                                    <option value="15:00">15:00 - 15:30</option>
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success btn-lg w-100 rounded-pill mt-3 py-3 shadow-sm">Жазылуды растау</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>