$(function() {
    $(window).on('scroll', function() {
        if ($(window).scrollTop() > 10) {
            $('.bg-dark').addClass('active');
        } else {
            $('.bg-dark').removeClass('active');
        }
    });
});
$('.btn-enregistrer').click(function() {
    $('.connexion').addClass('remove-section');
    $('.enregistrer').removeClass('active-section');
    $('.btn-enregistrer').removeClass('active');
    $('.btn-connexion').addClass('active');
});