<script>
    $('.wordListLi').on('click', function(event) {
        event.preventDefault();
        $('.wordListLi').css('background-color', 'rgba(246, 175, 121, 0.8)')
        $('.wordListLi').css('color', '#000')
        $('.videoDiv').css('visibility', 'visible')
        $('.moreThanOne').css('opacity', 1)
        const likeMatch = async function(data) {
            try {
                let response = await fetch('http://localhost/apiApajhv0/public/v1/likematch', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer <?php echo $_SESSION['token']; ?>'
                    },
                    body: JSON.stringify(data)
                })
                if (response.ok) {
                    let responseData = await response.json()
                    $('.wordList').attr('data-isLike', responseData.isLike)
                    $('.articleLike').attr('data-isLike', responseData.isLike);
                    $('.fa-heart').attr('data-isLike', responseData.isLike);
                    if ($('.fa-heart').attr('data-isLike') == 1) {
                        $('.fa-heart').removeClass('far');
                        $('.fa-heart').addClass('fas');
                    } else if ($('.fa-heart').attr('data-isLike') == 0) {
                        $('.fa-heart').removeClass('fas');
                        $('.fa-heart').addClass('far');
                    }
                    if ($('.articleLike').attr('data-isLike') == 1) {
                        $('.articleLike').removeClass('far');
                        $('.articleLike').addClass('fas');
                        $('.articleLike').attr('title', 'Clique pour ne plus aimer :(');
                    } else if ($('.articleLike').attr('data-isLike') == 0) {
                        $('.articleLike').removeClass('fas');
                        $('.articleLike').addClass('far');
                        $('.articleLike').attr('title', 'Clique pour aimer ! :)');
                    }
                } else {
                    console.error('Retour : ', response.status)
                }
            } catch (e) {
                console.log(e)
            }
        }
        likeMatch({
            id_content: $(this).attr('data-id')
        })
        const REGEX_GROUPS = /(\d)(?=(\d\d\d)+(?!\d))/g
        // Le délimiteur FR est le _Narrow No-Break Space_, eh oui !
        function useGrouping(int, delimiter = '\u202f') {
            return int.toString().replace(REGEX_GROUPS, `$1${delimiter}`)
        }
        var id = $(this).attr('data-id');
        var src = $(this).attr('data-src');
        var title = $(this).attr('data-contentTitle');
        var text = $(this).attr('data-videoText');
        var like = $(this).attr('data-like');
        var view = $(this).attr('data-view');
        console.log($(this).attr('data-view'))
        $('.ldsVideo').attr('src', src);
        $('h2.wordTitle').html(title);
        $('p.wordText').html(text);
        $('.badge').attr('id', 'like_' + id);
        if (like == 0) {
            $('.badge').html('Personne n\'aime');
        } else if (like > 1) {
            $('.badge').html(like + ' personnes aiment');
        } else {
            $('.badge').html(like + ' personne aime');
        }
        if (view == '' || view == 0) {
            $('.viewNumber').html(' 0 vue')
        } else if (view == 1) {
            $('.viewNumber').html(' 1 vue')
        } else {
            $('.viewNumber').html(' ' + useGrouping(view) + ' vues')
        }
        $('.wordTitle').attr('data-id', id)
        $('.badge').attr('data-like', like);
        $('.articleLike').attr('data-like', id);
        $('.hiddenId').attr('value', id);
        $('.hiddenCount').attr('value', like);
        $('.wordDiv').attr('data-id', id);
        $('.videoDiv').attr('id', 'video_' + id);
        $(this).css('background-color', '#5970B1')
        $(this).css('color', '#000')
        video.playbackRate = 1.0;
        $('.speedBtn').html('<img class="lievre" src="assets/img/lievre-blanc.png" alt=""> x2')
    });

    // Affichage du top 3 des likes vidéos
    $(document).ready(function() {
        const getTopThree = async function(data) {
            try {
                let response = await fetch('http://localhost/apiApajhv0/public/v1/likedVideo', {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer <?php echo $_SESSION['token']; ?>'
                    }
                })
                if (response.ok) {
                    let responseTop = await response.json()
                    var count = 1
                    const REGEX_GROUPS = /(\d)(?=(\d\d\d)+(?!\d))/g
                    // Le délimiteur FR est le _Narrow No-Break Space_, eh oui !
                    function useGrouping(int, delimiter = '\u202f') {
                        return int.toString().replace(REGEX_GROUPS, `$1${delimiter}`)
                    }
                    for (var resp in responseTop) {
                        var display = '<div class="top mb-2" data-id="' + responseTop[resp].id_content + '" data-topLike="' + responseTop[resp].numLike + '"><span class="position">' + count++ + '- </span><span>' + responseTop[resp].contentTitle + '</span><span class="category"> (' + responseTop[resp].category + ')</span><span class="likeNumber"> ' + useGrouping(responseTop[resp].numLike) + ' <i class="fas fa-heart"></i></span>'
                        '</div>'
                        $('.topThree').append(display)
                    }
                } else {
                    console.error('Retour : ', response.status)
                }
            } catch (e) {
                console.log(e)
            }
        }
        getTopThree()
    });

    // Affichage du top 3 des vues vidéos
    $(document).ready(function() {
        const getViewTopThree = async function(data) {
            try {
                let response = await fetch('http://localhost/apiApajhv0/public/v1/viewedVideo', {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer <?php echo $_SESSION['token']; ?>'
                    }
                })
                if (response.ok) {
                    let responseTopView = await response.json()
                    var count = 1
                    const REGEX_GROUPS = /(\d)(?=(\d\d\d)+(?!\d))/g
                    // Le délimiteur FR est le _Narrow No-Break Space_, eh oui !
                    function useGrouping(int, delimiter = '\u202f') {
                        return int.toString().replace(REGEX_GROUPS, `$1${delimiter}`)
                    }
                    for (var resp in responseTopView) {
                        var display = '<div class="top mb-2" data-id="' + responseTopView[resp].id_content + '" data-topLike="' + responseTopView[resp].numLike + '"><span class="position">' + count++ + '- </span><span>' + responseTopView[resp].contentTitle + '</span><span class="category"> (' + responseTopView[resp].category + ')</span><span class="likeNumber"> ' + useGrouping(responseTopView[resp].viewNumber) + ' <i class="far fa-eye"></span>'
                        '</div>'
                        $('.topThreeView').append(display)
                    }
                } else {
                    console.error('Retour : ', response.status)
                }
            } catch (e) {
                console.log(e)
            }
        }
        getViewTopThree()
    });

    // Ajoute une vues à la vidéo
    $('.wordListLi').on('click', function(event) {
        event.preventDefault();
        const videoView = async function(data) {
            try {
                let response = await fetch('http://localhost/apiApajhv0/public/v1/viewVideo', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                })
                if (response.ok) {
                    let responseVideoview = await response.json()
                } else {
                    console.error('Retour : ', response.status)
                }
            } catch (e) {
                console.log(e)
            }
        }
        videoView({
            id_content: $(this).attr('data-id')
        })
    });
</script>