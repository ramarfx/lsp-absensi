import './bootstrap';
import 'flowbite';

const searchInput = document.getElementById('search');
const tableRows = document.querySelectorAll('table tbody tr');

if (searchInput) {
    searchInput.addEventListener('input', function () {
        const keyword = this.value.toLowerCase();

        tableRows.forEach(row => {
            const rowText = row.innerText.toLowerCase();
            const isVisible = rowText.includes(keyword);
            row.style.display = isVisible ? '' : 'none';
        });
    });
}
