
document.addEventListener("DOMContentLoaded", () => {
    const openButtons = document.querySelectorAll('.button-plans');
    const closeButton = document.querySelector('.Close');
    const modal = document.getElementById('Opened');

    openButtons.forEach(button => {
        button.addEventListener('click', () => {
            modal.style.display = 'block';
        });
    });

    closeButton.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    window.addEventListener('click', (event) => {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });
});
