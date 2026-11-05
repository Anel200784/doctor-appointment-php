<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patient_name = $_POST['patient_name'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $appointment_date = $_POST['appointment_date'] ?? '';
    $appointment_time = $_POST['appointment_time'] ?? '';
    
    if (!empty($patient_name) && !empty($appointment_date)) {
        $message = "<div class='alert alert-success text-center mb-4'>Құттықтаймыз, <strong>$patient_name</strong>! Сіз <strong>$appointment_date</strong> күні уақыты <strong>$appointment_time</strong> қабылдауға сәтті жазылдыңыз.</div>";
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
            <a class="btn btn-outline-secondary btn-sm rounded-pill px-3" href="index.php">Артқа қайту</a>
        </div>
    </nav>

    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card p-4 bg-white shadow-sm border-0 rounded-4">
                    <div class="text-center mb-4">
                        <h3 class="fw-bold text-dark">Қабылдауға жазылу</h3>
                        <p class="text-muted">Таңдалған маман: <strong class="text-primary">Др. Айдос Мұратұлы (Терапевт)</strong></p>
                    </div>

                    <?php echo $message; ?>

                    <form action="appointment.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label fw-medium">Пациенттің аты-жөні</label>
                            <input type="text" name="patient_name" class="form-control form-control-lg bg-light border-0" placeholder="Толық аты-жөніңізді жазыңыз" required>
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