$(document).ready(function() {
    verificarTamañoPantalla();
    $("body").css("visibility","visible");
});
function verificarTamañoPantalla() {
    var anchoPantalla = $(window).width();
    if (anchoPantalla < 768) {
        $("#carouselExampleCaptions").hide();
    }else{
        $("#carouselExampleCaptions").show();
    }
}
setInterval(verificarTamañoPantalla, 1000);
