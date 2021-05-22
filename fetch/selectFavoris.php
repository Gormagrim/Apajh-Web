<script>
    $('.favoris.ldsfVideo').on('click', function(event){
        $('.favoritSelect').css('visibility', 'visible')
        $('.favorisV').css('visibility', 'visible')
    })
     $('.favoritSelect').on('change', function(event) {
        $('.favoritSelectWord').empty()
        $('.favoritSelectWord').css('visibility', 'visible')
        event.preventDefault();
        const getVideoByCatName = async function(data) {
            try {
                let response = await fetch('http://localhost/apiApajhv0/public/v1/likeVideosCat', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer <?php echo $_SESSION['token']; ?>'
                    },
                    body: JSON.stringify(data)
                })
                if (response.ok) {
                    let responseData = await response.json()
                    var index = '<option value="">--Choisissez votre mot--</option>'
                    $('.favoritSelectWord').append(index)
                    for (var resp in responseData) {
                        var display = '<option data-id="' + responseData[resp].id_content + '" value="' + responseData[resp].id_content + '">' + responseData[resp].contentTitle + '</option>'
                        $('.favoritSelectWord').append(display)
                    }

                } else {
                    console.error('Retour : ', response.status)
                }
            } catch (e) {
                console.log(e)
            }
        }
        getVideoByCatName({
            category: $(this).val()
        })
    });
    $('.favoritSelectWord').on('change', function(event) {
        event.preventDefault();
        $('.wordTitle').empty()
        $('.category.cat').empty()
        $('.wordText').empty()
        $('.videoDiv').css('visibility', 'visible')
        $('.ldsVideoByCat').attr('src', '')
        $('.moreThanOne').css('opacity', 1)
        const getVideoById = async function(data) {
            try {
                let response = await fetch('http://localhost/apiApajhv0/public/v1/videoContent', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer <?php echo $_SESSION['token']; ?>'
                    },
                    body: JSON.stringify(data)
                })
                if (response.ok) {
                    let responseDataId = await response.json()
                    $('.hiddenFileName').attr('data-fileName', responseDataId[0].video[0].fileName)
                    $('.wordTitle').append(responseDataId[0].video[0].videoTitle)
                    $('.category.cat').append('Catégorie: ' + responseDataId[0].category[0].category)
                    $('.wordText').append(responseDataId[0].video[0].videoText)
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
</script>