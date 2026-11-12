<?php
session_start();
require_once 'db.php';

$stmt = $pdo->query("SELECT * FROM appointments ORDER BY id DESC");
$appointments = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="kk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicall - Менің жазылымдарым</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-3 mb-5">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary fs-4" href="index.php">🏥 Medicall</a>
            <a class="btn btn-outline-secondary btn-sm rounded-pill px-3" href="index.php">Басты бетке қайту</a>
        </div>
    </nav>

    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card p-4 bg-white shadow-sm border-0 rounded-4">
                    <h3 class="fw-bold text-dark mb-4 text-center">📅 Менің қабылдауға жазылымдарым</h3>

                    <?php if (count($appointments) > 0): ?>
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>№</th>
                                        <th>Дәрігер</th>
                                        <th>Күні</th>
                                        <th>Уақыты</th>
                                        <th>Жазылған уақыты</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($appointments as $index => $app): ?>
                                        <tr>
                                            <td><?php echo $index + 1; ?></td>
                                            <td class="fw-bold text-primary"><?php echo htmlspecialchars($app['doctor_name']); ?></td>
                                            <td><?php echo htmlspecialchars($app['appointment_date']); ?></td>
                                            <td><span class="badge bg-success"><?php echo htmlspecialchars($app['appointment_time']); ?></span></td>
                                            <td class="text-muted small"><?php echo htmlspecialchars($app['created_at']); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <div class="text-center py-4">
                            <p class="text-muted">Әзірге қабылдауға жазылымдар жоқ.</p>
                            <a href="index.php" class="btn btn-primary rounded-pill px-4">Дәрігер таңдау</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>