// Fonction Ajax pour les likes
$('.articleLike').on('click', function (event) {
    event.preventDefault();
    $.post('../public/auditif-like', {
        placeLike: $(this).attr('data-like')
    },
        'JSON'
    );
});
// JS pour les likes
$('.articleLike').on('click', function (event) {
    event.preventDefault();
    var isLike = $(this).attr('data-isLike');
    console.log(isLike);
    if (isLike == 1) {
        var countt = $('.hiddenCount').val();
        if (countt > 0) {
            countt--
        }
        $('.articleLike').attr('data-isLike', 0);
        $('.articleLike').removeClass('like');
        $('.articleLike').addClass('notLike');
        if (countt == 0) {
            $('span.badge').text('Personne n\'aime');
        }else if(countt > 1) {
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
        var countt = $('.hiddenCount').val();
        $('.articleLike').attr('data-isLike', 1);
        $('.articleLike').removeClass('notLike');
        $('.articleLike').addClass('like');
        $('.badge').removeClass('notLike');
        $('.badge').addClass('like');
        $('.fa-heart').addClass('animate__heartBeat');
        $('.fa-heart').removeClass('far');
        $('.fa-heart').addClass('fas');
        if (countt == 0) {
            $('span.badge').text('Vous aimez');
        } else if (countt == 1) {
            $('span.badge').text('Vous et ' + countt + ' personne aiment');
        } else if (countt > 1) {
            $('span.badge').text('Vous et ' + countt + ' personnes aiment');
        }
        $('.fa-thumbs-up').removeClass('far');
        $('.fa-thumbs-up').addClass('fas');
    }
});

$('.articleBlogLike').on('click', function () {
    var isLike = $(this).attr('data-isLike');
    if (isLike == 1) {
        $('.fa-thumbs-up').removeClass('fas');
        $('.fa-thumbs-up').addClass('far');
        $('.articleBlogLike').attr('data-isLike', 0)
        $('.fa-thumbs-up').removeClass('animate__heartBeat');
        $('span.badge').removeClass('animate__heartBeat')
    } else if (isLike == 0) {
        $('.fa-thumbs-up').addClass('animate__heartBeat');
        $('span.badge').addClass('animate__heartBeat')
        $('.fa-thumbs-up').removeClass('far');
        $('.fa-thumbs-up').addClass('fas');
        $('.articleBlogLike').attr('data-isLike', 1)
    }
});

$(document).ready(function() {
    var isLike = $('.articleBlogLike').attr('data-isLike');
    var like = $('span.badge').attr('data-count')
    $('span.badge').html(like)
    if (isLike == 1) {
        $('.articleBlogLike').removeClass('far');
        $('.articleBlogLike').addClass('fas');
    } else if (isLike == 0) {
        $('.articleBlogLike').removeClass('fas');
        $('.articleBlogLike').addClass('far');
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
    $('.speedBtn').html('<img class="lievre" src="assets/img/lievre-blanc.png" alt=""> x2')
});
$('.speed_75').click(function() {
    video.playbackRate = 0.75;
    $('.speedBtn').html('<img class="lievre" src="assets/img/lievre-blanc.png" alt="">')
});
$('.speed_50').click(function() {
    video.playbackRate = 0.50;
    $('.speedBtn').html('<img class="tortue" src="assets/img/tortue-blanche.png" alt="">')
});
$('.speed_25').click(function() {
    video.playbackRate = 0.25;
    $('.speedBtn').html('<img class="tortue" src="assets/img/tortue-blanche.png" alt=""> x2')
});



