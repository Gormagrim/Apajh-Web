<script>
    $('.wordListLi').on('click', function(event) {
        event.preventDefault();
        $('.wordListLi').css('background-color', '#FADCE6')
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
        if (like > 1) {
            $('.badge').html(like + ' personnes aiment');
        } else {
            $('.badge').html(like + ' personne aime');
        }
        if (view == 0) {
            $('.viewNumber').html(' 0 vue')
        } else if (view == 1) {
            $('.viewNumber').html(' ' + view + ' vue')
        }else {
            $('.viewNumber').html(' ' + view + ' vues')
        }
        
        $('.wordTitle').attr('data-id', id)
        $('.badge').attr('data-like', like);
        $('.articleLike').attr('data-like', id);
        $('.hiddenId').attr('value', id);
        $('.hiddenCount').attr('value', like);
        $('.wordDiv').attr('data-id', id);
        $('.videoDiv').attr('id', 'video_' + id);
        $(this).css('background-color', '#677DB7')
        $(this).css('color', '#FFF')
    });

    // Affichage du top 3 des vidéos
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
                    for (var resp in responseTop) {
                        var display = '<div class="top" data-id="' + responseTop[resp].id_content + '" data-topLike="' + responseTop[resp].numLike + '"><span class="position">' + count++ + '- </span><span>' + responseTop[resp].contentTitle + '</span><span class="category"> (' + responseTop[resp].category + ')</span><span class="likeNumber"> ' + responseTop[resp].numLike + ' <i class="fas fa-heart"></i></span>'
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

</script>
<script>
                $(document).ready(function() {
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
                                console.log($('.wordTitle').attr('data-id'))
                            } else {
                                console.error('Retour : ', response.status)
                            }
                        } catch (e) {
                            console.log(e)
                        }
                    }
                    videoView({
                        id_content: <?= $word->id ?>
                    })
                });
            </script>