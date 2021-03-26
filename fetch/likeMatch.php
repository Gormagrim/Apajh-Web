<script>
    $('.wordListLi').on('click', function(event) {
        event.preventDefault();
        $('.wordListLi').css('background-color', '#FADCE6')
        $('.wordListLi').css('color', '#000')
        $('.videoDiv').css('visibility', 'visible')
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
                    console.log(responseData)
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
        $('.ldsVideo').attr('src', src);
        $('h2.wordTitle').html(title);
        $('p.wordText').html(text);
        $('.badge').attr('id', 'like_' + id);
        if (like > 1) {
            $('.badge').html(like + ' personnes aiment');
        } else {
            $('.badge').html(like + ' personne aime');
        }
        $('.badge').attr('data-like', like);
        $('.articleLike').attr('data-like', id);
        $('.hiddenId').attr('value', id);
        $('.hiddenCount').attr('value', like);
        $('.wordDiv').attr('data-id', id);
        $('.videoDiv').attr('id', 'video_' + id);
        $(this).css('background-color', '#677DB7')
        $(this).css('color', '#FFF')
    });
</script>