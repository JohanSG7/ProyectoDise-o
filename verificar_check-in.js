$(document).ready(function() {
    $('#menu-checkin').click(function() {
        $('#check-in-form').toggle();
    });

    $('#form-check-in').submit(function(event) {
        event.preventDefault();

        $.ajax({
            url: 'procesar_check-in.php',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                var res = JSON.parse(response);
                $('#check-in-message').html(res.message);
                if (res.status === 'success') {
                    $('#check-in-message').css('color', 'green');
                } else {
                    $('#check-in-message').css('color', 'red');
                }
            }
        });
    });
});