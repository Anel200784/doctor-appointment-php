document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById('searchInput');
    const searchBtn = document.getElementById('searchBtn');

    function filterDoctors() {
        let term = searchInput ? searchInput.value.toLowerCase().trim() : '';
        let cards = document.querySelectorAll('#doctorList .col-md-4');
        
        cards.forEach(card => {
            let name = card.querySelector('.card-title').innerText.toLowerCase();
            let specialty = card.querySelector('.text-primary').innerText.toLowerCase();
            
            // Аты немесе мамандығы бойынша іздеу
            if (name.includes(term) || specialty.includes(term)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }

    if (searchInput) {
        searchInput.addEventListener('input', filterDoctors);
    }

    if (searchBtn) {
        searchBtn.addEventListener('click', function(e) {
            e.preventDefault();
            filterDoctors();
        });
    }
});