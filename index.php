<?php
session_start();
?>
<!DOCTYPE html>
<html lang="kk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicall - Дәрігерге онлайн жазылу</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- Навигация -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-3">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary fs-4" href="index.php">🏥 Medicall</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto ms-4">
                        <li class="nav-item"><a class="nav-link active fw-medium" href="index.php">Басты бет</a></li>
                        <li class="nav-item"><a class="nav-link fw-medium" href="#doctorList">Мамандар</a></li>
                        <li class="nav-item"><a class="nav-link fw-medium" href="my_appointments.php">Менің жазылымдарым</a></li>
                </ul>
                <ul class="navbar-nav ms-auto align-items-center">
                    <?php if (isset($_SESSION['user_name'])): ?>
                        <span class="me-3 fw-medium text-secondary">Сәлем, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</span>
                        <a href="logout.php" class="btn btn-outline-danger btn-sm rounded-pill px-3">Шығу</a>
                    <?php else: ?>
                        <li class="nav-item"><a class="nav-link fw-medium me-2" href="login.php">Кіру</a></li>
                        <li class="nav-item"><a class="btn btn-primary px-4 rounded-pill text-white" href="register.php">Тіркелу</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Басты баннер және іздеу бөлімі -->
    <div class="hero-section text-center mb-5">
        <div class="container py-5">
            <h1 class="fw-bold display-5 mb-3 text-white">Өз дәрігеріңізді табыңыз және онлайн жазылыңыз</h1>
            <p class="lead mb-4 text-white opacity-75">Емханаға кезекке тұрмай, үйден шықпай-ақ уақытыңызды үнемдеңіз</p>
            
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card p-3 shadow-lg bg-white border-0 rounded-4">
                        <div class="row g-2">
                            <div class="col-md-9">
                                <input type="text" id="searchInput" class="form-control form-control-lg border-0 bg-light" placeholder="Дәрігердің аты-жөні немесе мамандығы...">
                            </div>
                            <div class="col-md-3">
                                <button id="searchBtn" class="btn btn-primary btn-lg w-100 rounded-3">Іздеу</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Дәрігерлер тізімі -->
    <div class="container mb-5">
        <h3 class="fw-bold mb-4 text-dark">Біздің білікті мамандар</h3>
        <div class="row" id="doctorList">
            
            <!-- 1. Терапевт -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm p-3 bg-white border-0 rounded-4">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <img src="https://images.unsplash.com/photo-1537368910025-700350fe46c7?auto=format&fit=crop&w=150&q=80" class="rounded-circle shadow-sm" width="90" height="90" alt="Дәрігер">
                        </div>
                        <h5 class="card-title fw-bold text-dark">Др. Айдос Мұратұлы</h5>
                        <p class="text-primary fw-medium mb-1">Терапевт</p>
                        <p class="text-muted small mb-3">Өтілі: 8 жыл | Кабинет: 204</p>
                        <a href="appointment.php?doctor=Айдос+Мұратұлы&spec=Терапевт" class="btn btn-primary w-100 rounded-pill py-2">Қабылдауға жазылу</a>
                    </div>
                </div>
            </div>

            <!-- 2. Стоматолог -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm p-3 bg-white border-0 rounded-4">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?auto=format&fit=crop&w=150&q=80" class="rounded-circle shadow-sm" width="90" height="90" alt="Дәрігер">
                        </div>
                        <h5 class="card-title fw-bold text-dark">Др. Әсел Қанатқызы</h5>
                        <p class="text-primary fw-medium mb-1">Стоматолог</p>
                        <p class="text-muted small mb-3">Өтілі: 5 жыл | Кабинет: 310</p>
                        <a href="appointment.php?doctor=Әсел+Қанатқызы&spec=Стоматолог" class="btn btn-primary w-100 rounded-pill py-2">Қабылдауға жазылу</a>
                    </div>
                </div>
            </div>

            <!-- 3. Кардиолог -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm p-3 bg-white border-0 rounded-4">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <img src="https://images.unsplash.com/photo-1622253692010-333f2da6031d?auto=format&fit=crop&w=150&q=80" class="rounded-circle shadow-sm" width="90" height="90" alt="Дәрігер">
                        </div>
                        <h5 class="card-title fw-bold text-dark">Др. Ерлан Сейілхан</h5>
                        <p class="text-primary fw-medium mb-1">Кардиолог</p>
                        <p class="text-muted small mb-3">Өтілі: 12 жыл | Кабинет: 115</p>
                        <a href="appointment.php?doctor=Ерлан+Сейілхан&spec=Кардиолог" class="btn btn-primary w-100 rounded-pill py-2">Қабылдауға жазылу</a>
                    </div>
                </div>
            </div>

            <!-- 4. Невропатолог -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm p-3 bg-white border-0 rounded-4">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <img src="https://images.unsplash.com/photo-1594824813587-32782e46c7f4?auto=format&fit=crop&w=150&q=80" class="rounded-circle shadow-sm" width="90" height="90" alt="Дәрігер">
                        </div>
                        <h5 class="card-title fw-bold text-dark">Др. Динара Жолдыбаева</h5>
                        <p class="text-primary fw-medium mb-1">Невропатолог</p>
                        <p class="text-muted small mb-3">Өтілі: 9 жыл | Кабинет: 405</p>
                        <a href="appointment.php?doctor=Динара+Жолдыбаева&spec=Невропатолог" class="btn btn-primary w-100 rounded-pill py-2">Қабылдауға жазылу</a>
                    </div>
                </div>
            </div>

            <!-- 5. Педиатр -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm p-3 bg-white border-0 rounded-4">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <img src="https://images.unsplash.com/photo-1527613426441-2da17477ef66?auto=format&fit=crop&w=150&q=80" class="rounded-circle shadow-sm" width="90" height="90" alt="Дәрігер">
                        </div>
                        <h5 class="card-title fw-bold text-dark">Др. Марат Төлегенұлы</h5>
                        <p class="text-primary fw-medium mb-1">Педиатр</p>
                        <p class="text-muted small mb-3">Өтілі: 7 жыл | Кабинет: 102</p>
                        <a href="appointment.php?doctor=Марат+Төлегенұлы&spec=Педиатр" class="btn btn-primary w-100 rounded-pill py-2">Қабылдауға жазылу</a>
                    </div>
                </div>
            </div>

            <!-- 6. Офтальмолог -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm p-3 bg-white border-0 rounded-4">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <img src="https://images.unsplash.com/photo-1584515979956-d9f6e5d09982?auto=format&fit=crop&w=150&q=80" class="rounded-circle shadow-sm" width="90" height="90" alt="Дәрігер">
                        </div>
                        <h5 class="card-title fw-bold text-dark">Др. Айжан Бекболатқызы</h5>
                        <p class="text-primary fw-medium mb-1">Офтальмолог</p>
                        <p class="text-muted small mb-3">Өтілі: 6 жыл | Кабинет: 218</p>
                        <a href="appointment.php?doctor=Айжан+Бекболатқызы&spec=Офтальмолог" class="btn btn-primary w-100 rounded-pill py-2">Қабылдауға жазылу</a>
                    </div>
                </div>
            </div>

            <!-- 7. Хирург -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm p-3 bg-white border-0 rounded-4">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <img src="https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?auto=format&fit=crop&w=150&q=80" class="rounded-circle shadow-sm" width="90" height="90" alt="Дәрігер">
                        </div>
                        <h5 class="card-title fw-bold text-dark">Др. Руслан Өтегенов</h5>
                        <p class="text-primary fw-medium mb-1">Хирург</p>
                        <p class="text-muted small mb-3">Өтілі: 15 жыл | Кабинет: 101</p>
                        <a href="appointment.php?doctor=Руслан+Өтегенов&spec=Хирург" class="btn btn-primary w-100 rounded-pill py-2">Қабылдауға жазылу</a>
                    </div>
                </div>
            </div>

            <!-- 8. ЛОР -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm p-3 bg-white border-0 rounded-4">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <img src="https://images.unsplash.com/photo-1537368910025-700350fe46c7?auto=format&fit=crop&w=150&q=80" class="rounded-circle shadow-sm" width="90" height="90" alt="Дәрігер">
                        </div>
                        <h5 class="card-title fw-bold text-dark">Др. Салтанат Нұрланқызы</h5>
                        <p class="text-primary fw-medium mb-1">ЛОР маман</p>
                        <p class="text-muted small mb-3">Өтілі: 4 жыл | Кабинет: 305</p>
                        <a href="appointment.php?doctor=Салтанат+Нұрланқызы&spec=ЛОР+маман" class="btn btn-primary w-100 rounded-pill py-2">Қабылдауға жазылу</a>
                    </div>
                </div>
            </div>

            <!-- 9. Дерматолог -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm p-3 bg-white border-0 rounded-4">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?auto=format&fit=crop&w=150&q=80" class="rounded-circle shadow-sm" width="90" height="90" alt="Дәрігер">
                        </div>
                        <h5 class="card-title fw-bold text-dark">Др. Бақытжан Сманов</h5>
                        <p class="text-primary fw-medium mb-1">Дерматолог</p>
                        <p class="text-muted small mb-3">Өтілі: 10 жыл | Кабинет: 212</p>
                        <a href="appointment.php?doctor=Бақытжан+Сманов&spec=Дерматолог" class="btn btn-primary w-100 rounded-pill py-2">Қабылдауға жазылу</a>
                    </div>
                </div>
            </div>

        </div>
    </div>