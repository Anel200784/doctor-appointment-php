// 1. index.html үшін дәрігерлерді іздеу функциясы
const searchInput = document.getElementById('searchInput');
if (searchInput) {
    searchInput.addEventListener('input', function(e) {
        let term = e.target.value.toLowerCase();
        let cards = document.querySelectorAll('#doctorList .col-md-4');
        cards.forEach(card => {
            let name = card.querySelector('.card-title').innerText.toLowerCase();
            if(name.includes(term)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    });
}

// 2. login.html үшін жүйеге кіруді имитациялау
const loginForm = document.getElementById('loginForm');
if (loginForm) {
    loginForm.addEventListener('submit', function(e) {
        e.preventDefault();
        alert('Жүйеге сәтті кірдіңіз!');
        window.location.href = 'index.html';
    });
}

// 3. appointment.html үшін қабылдауға жазылуды растау
const bookingForm = document.getElementById('bookingForm');
if (bookingForm) {
    bookingForm.addEventListener('submit', function(e) {
        e.preventDefault();
        alert('Құттықтаймыз! Сіз қабылдауға сәтті жазылдыңыз.');
        window.location.href = 'index.html';
    });
}