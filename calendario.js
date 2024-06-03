$(document).ready(function() {
    $("#date-picker").datepicker({
        dateFormat: 'yy-mm-dd', 
        onSelect: function(dateText) {
            $("#selected-date").text(dateText);
            $("#date-picker").fadeOut();
        }
    });

    $("#show-calendar").click(function() {
        $("#date-picker").toggle("slide");
    });

    $("#validate-date").click(function() {
        const selectedDate = $("#selected-date").text();
        if (selectedDate === "Ninguna") {
            alert("Por favor, seleccione una fecha primero.");
        } else {
            $.ajax({
                url: 'dispf.php',
                method: 'POST',
                data: { date: selectedDate },
                success: function(response) {
                    $("#validation-result").text(response);
                    if (response.trim() === "La fecha seleccionada está disponible") {
                        $("#select-room").fadeIn();
                    } else {
                        $("#select-room").fadeOut();
                    }
                },
                error: function() {
                    $("#validation-result").text("Error al validar la fecha.");
                    $("#select-room").fadeOut();
                }
            });
        }
    });

    $("#select-room").click(function() {
        window.location.href = "seleccionar_habitacion.html";
    });
});