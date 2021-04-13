<script>
    //PREMIER SELECT
    $('.catItem').on('change', function(event) {
        $('.catWord').empty()
        event.preventDefault();
        const getVideoByCat = async function(data) {
            try {
                let response = await fetch('http://localhost/apiApajhv0/public/v1/videos-cat', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                })
                if (response.ok) {
                    let responseDataCatId = await response.json()
                    for (var resp in responseDataCatId) {
                        var display = '<option data-id="' + responseDataCatId[resp].id_content + '" value="' + responseDataCatId[resp].id_content + '">' + responseDataCatId[resp].videoTitle + '</option>'
                        $('.catWord').append(display)
                    }

                } else {
                    console.error('Retour : ', response.status)
                }
            } catch (e) {
                console.log(e)
            }
        }
        getVideoByCat({
            id_category: $(this).val()
        })
    });
    //SECOND SELECT
    $('.catWord').on('change', function(event) {
        event.preventDefault();
        $('.wordTitle').empty()
        $('.category.cat').empty()
        $('.badge').attr('id', 'like_')
        $('.badge').attr('data-like', '')
        $('.wordText').empty()
        $('.contentLike').attr('value', '')
        $('.hiddenCount').attr('value', '')
        $('.videoDiv').css('visibility', 'visible')
        $('.ldsVideoByCat').attr('src', '')
        const getVideoById = async function(data) {
            try {
                let response = await fetch('http://localhost/apiApajhv0/public/v1/videoContent', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                })
                if (response.ok) {
                    let responseDataId = await response.json()
                    $('.hiddenFileName').attr('data-fileName', responseDataId[0].video[0].fileName)
                    $('.catWord').attr('data-fileName', responseDataId[0].video[0].fileName)
                    $('.wordTitle').append(responseDataId[0].video[0].videoTitle)
                    $('.category.cat').append('Catégorie: ' + responseDataId[0].category[0].category)
                    $('.badge').attr('id', 'like_' + responseDataId[0].id)
                    var countLike = (responseDataId[0].like).length
                    $('.badge').attr('data-like', countLike)
                    $('.hiddenFileName').attr('data-like', countLike)
                    $('.wordText').append(responseDataId[0].video[0].videoText)
                    $('.contentLike').attr('value', responseDataId[0].id)
                    $('.hiddenCount').attr('value', countLike)
                    $('.articleLike').attr('data-like', responseDataId[0].id)
                    var fileName = $('.hiddenFileName').attr('data-fileName')
                    const getVideo = async function() {
                        try {

                            let response = await fetch('http://localhost/apiApajhv0/public/v1/video/' + fileName, {
                                method: 'GET',
                                headers: {
                                    'Content-Type': 'application/json'
                                }
                            })
                            if (response.ok) {
                                let responseDataSrc = await response.json()
                                $('#ldsVideo').attr('src', 'data:' + responseDataSrc.type + ';base64,' + responseDataSrc.file)
                            } else {
                                console.error('Retour : ', response.status)
                            }
                        } catch (e) {
                            console.log(e)
                        }
                    }
                    getVideo(fileName)
                } else {
                    console.error('Retour : ', response.status)
                }
            } catch (e) {
                console.log(e)
            }
        }
        getVideoById({
            id: $(this).val()
        })

    });
    $('.catWord').on('change', function(event) {
        event.preventDefault();
        var countLike = $('.hiddenFileName').attr('data-like');
        console.log(countLike)
        if (countLike > 1) {
            $('.badge').html(countLike + ' personnes aiment');
        } else {
            $('.badge').html(countLike + ' personne aime');
        }
        <?php if (!empty($_SESSION['token'])) { ?>
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
                        $('.hiddenFileName').attr('data-isLike', responseData.isLike)
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
                        var countLike = $('.badge').attr('data-like');
                        if (countLike > 1) {
                            $('.badge').html(countLike + ' personnes aiment');
                        } else {
                            $('.badge').html(countLike + ' personne aime');
                        }
                        console.log(countLike)
                    } else {
                        console.error('Retour : ', response.status)
                    }
                } catch (e) {
                    console.log(e)
                }
            }
            likeMatch({
                id_content: $(this).val()
            })
        <?php  }  ?>
    });
</script>