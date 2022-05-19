<script>
    // Nombre de mots
    $(document).ready(function() {
        const CountVideo = async function(data) {
            try {
                let response = await fetch('http://www.api.apajh-num-et-rik.fr/public/v1/countVideos', {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json'
                    }
                })
                if (response.ok) {
                    const REGEX_GROUPS = /(\d)(?=(\d\d\d)+(?!\d))/g
                    // Le délimiteur FR est le _Narrow No-Break Space_, eh oui !
                    function useGrouping(int, delimiter = '\u202f') {
                        return int.toString().replace(REGEX_GROUPS, `$1${delimiter}`)
                    }
                    let responseCountWord = await response.json()
                    $('.wordNumber').append(useGrouping(responseCountWord))
                } else {
                    console.error('Retour : ', response.status)
                }
            } catch (e) {
                console.log(e)
            }
        }
        CountVideo()
    });
    // Nombre de catégories
    $(document).ready(function() {
        const CountCat = async function(data) {
            try {
                let response = await fetch('http://www.api.apajh-num-et-rik.fr/public/v1/countCat', {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json'
                    }
                })
                if (response.ok) {
                    const REGEX_GROUPS = /(\d)(?=(\d\d\d)+(?!\d))/g
                    // Le délimiteur FR est le _Narrow No-Break Space_, eh oui !
                    function useGrouping(int, delimiter = '\u202f') {
                        return int.toString().replace(REGEX_GROUPS, `$1${delimiter}`)
                    }
                    let responseCountCat = await response.json()
                    $('.catNumber').append(useGrouping(responseCountCat))
                } else {
                    console.error('Retour : ', response.status)
                }
            } catch (e) {
                console.log(e)
            }
        }
        CountCat()
    });
    //PREMIER SELECT
    $('.catItem').on('change', function(event) {
        $('.catWord').empty()
        $('.catWord').css('visibility', 'visible')
        event.preventDefault();
        const getVideoByCat = async function(data) {
            try {
                let response = await fetch('http://www.api.apajh-num-et-rik.fr/public/v1/videos-cat', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                })
                if (response.ok) {
                    let responseDataCatId = await response.json()
                    var index = '<option value="">--Choisissez votre mot--</option>'
                    $('.catWord').append(index)
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
        $('.moreThanOne').css('opacity', 1)
        $('.viewNumber').empty()
        video.playbackRate = 1.0;
        $('.speedBtn').html('<img class="lievre" src="assets/img/lievre-blanc.png" alt=""> x2')
        const getVideoById = async function(data) {
            try {
                let response = await fetch('http://www.api.apajh-num-et-rik.fr/public/v1/videoContent', {
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
                    $('.wordTitle').attr('data-id', responseDataId[0].id)
                    const REGEX_GROUPS = /(\d)(?=(\d\d\d)+(?!\d))/g
                    // Le délimiteur FR est le _Narrow No-Break Space_, eh oui !
                    function useGrouping(int, delimiter = '\u202f') {
                        return int.toString().replace(REGEX_GROUPS, `$1${delimiter}`)
                    }
                    if (responseDataId[0].view[0].viewNumber == [] || responseDataId[0].view[0].viewNumber == 0 || responseDataId[0].view[0].viewNumber == '') {
                        $('.viewNumber').html(' 0 vue')
                    } else if (responseDataId[0].view[0].viewNumber == 1) {
                        $('.viewNumber').html(' ' + responseDataId[0].view[0].viewNumber + ' vue')
                    } else {
                        $('.viewNumber').html(' ' + useGrouping(responseDataId[0].view[0].viewNumber) + ' vues')
                    }
                    var fileName = $('.hiddenFileName').attr('data-fileName')
                    const getVideo = async function() {
                        try {

                            let response = await fetch('http://www.api.apajh-num-et-rik.fr/public/v1/video/' + fileName, {
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
        const REGEX_GROUPS = /(\d)(?=(\d\d\d)+(?!\d))/g
        // Le délimiteur FR est le _Narrow No-Break Space_, eh oui !
        function useGrouping(int, delimiter = '\u202f') {
            return int.toString().replace(REGEX_GROUPS, `$1${delimiter}`)
        }
        if (countLike == 0) {
            $('.badge').html('Personne n\'aime');
        } else if (countLike > 1) {
            $('.badge').html(useGrouping(countLike) + ' personnes aiment');
        } else {
            $('.badge').html(countLike + ' personne aime');
        }
        <?php if (!empty($_SESSION['token'])) { ?>
            const likeMatch = async function(data) {
                try {
                    let response = await fetch('http://www.api.apajh-num-et-rik.fr/public/v1/likematch', {
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
                        const REGEX_GROUPS = /(\d)(?=(\d\d\d)+(?!\d))/g
                        // Le délimiteur FR est le _Narrow No-Break Space_, eh oui !
                        function useGrouping(int, delimiter = '\u202f') {
                            return int.toString().replace(REGEX_GROUPS, `$1${delimiter}`)
                        }
                        if (countLike == 0) {
                            $('.badge').html('Personne n\'aime');
                        } else if (countLike > 1) {
                            $('.badge').html(useGrouping(countLike) + ' personnes aiment');
                        } else {
                            $('.badge').html(countLike + ' personne aime');
                        }
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
    $('.catWord').on('change', function(event) {
        event.preventDefault();
        const videoView = async function(data) {
            try {
                let response = await fetch('http://www.api.apajh-num-et-rik.fr/public/v1/viewVideo', {
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
            id_content: $(this).val()
        })
    });
    //SELECT pour un nombre de réponses > 6 (sans éffacer .catItem)
    $('.wordItem').on('change', function(event) {
        event.preventDefault();
        $('.moreThanOne').css('opacity', 1)
        const getVideoByCat = async function(data) {
            try {
                let response = await fetch('http://www.api.apajh-num-et-rik.fr/public/v1/videos-cat', {
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
                        $('.wordTitle').attr('data-id', responseDataCatId[resp].id_content)
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
</script>