document.addEventListener('DOMContentLoaded', (event) => {
    const reservaButtons = document.querySelectorAll('.reserva-btn');
    const valorHabitacionInput = document.getElementById('valor-habitacion');

    reservaButtons.forEach(button => {
        button.addEventListener('click', function() {
            const valorHabitacion = this.getAttribute('data-value');
            valorHabitacionInput.value = valorHabitacion;
        });
    });
});