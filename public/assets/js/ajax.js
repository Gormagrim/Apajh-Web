// Fonction Ajax pour les likes
$('.articleLike').on('click', function (event) {
    event.preventDefault();
    $.post('../public/auditif-like', {
        placeLike: $(this).attr('data-like')
    },
        'JSON'
    );
});
// JS pour les likes - PAS TOP A MODIFIER
$('.articleLike').on('click', function (event) {
    event.preventDefault();
    var isLike = $(this).attr('data-isLike');
    console.log(isLike);
    if (isLike == 1) {
        var countt = $('.hiddenCount').val();
        countt--
        $('.articleLike').attr('data-isLike', 0);
        $('.articleLike').removeClass('like');
        $('.articleLike').addClass('notLike');
        if(countt > 1) {
            $('span.badge').text(countt + ' personnes aiment');
        } else {
            $('span.badge').text(countt + ' personne aime');
        }
        $('.badge').removeClass('like');
        $('.badge').addClass('notLike');
        $('.fa-heart').addClass('animate__heartBeat');
        $('.fa-heart').removeClass('fas');
        $('.fa-heart').addClass('far');
        $('.fa-thumbs-up').removeClass('fas');
        $('.fa-thumbs-up').addClass('far');
    } else if (isLike == 0) {
        console.log(isLike);
        var count = $('span.badge').text();
        $('.articleLike').attr('data-isLike', 1);
        $('.articleLike').removeClass('notLike');
        $('.articleLike').addClass('like');
        $('.badge').removeClass('notLike');
        $('.badge').addClass('like');
        $('.fa-heart').addClass('animate__heartBeat');
        $('.fa-heart').removeClass('far');
        $('.fa-heart').addClass('fas');
        $('span.badge').text('Vous et ' + count);
        $('.fa-thumbs-up').removeClass('far');
        $('.fa-thumbs-up').addClass('fas');
    }
});

// Vitesse de lecture vidéo
var video = document.getElementById('ldsVideo');
var intervalRewind;
$(video).on('play',function(){
    video.playbackRate = 1.0;
    clearInterval(intervalRewind);
});
$(video).on('pause',function(){
    video.playbackRate = 1.0;
    clearInterval(intervalRewind);
});
$('.speed_100').click(function() {
    video.playbackRate = 1.0;
    $('.speedBtn').html('Vitesse de lecture')
});
$('.speed_75').click(function() {
    video.playbackRate = 0.75;
    $('.speedBtn').html('Vitesse de lecture x 0.75')
});
$('.speed_50').click(function() {
    video.playbackRate = 0.50;
    $('.speedBtn').html('Vitesse de lecture x 0.50')
});
$('.speed_25').click(function() {
    video.playbackRate = 0.25;
    $('.speedBtn').html('Vitesse de lecture x 0.25')
});



