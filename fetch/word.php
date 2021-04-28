<script>
    $(document).ready(function() {
        const getWordList = async function(data) {
            try {
                let response = await fetch('http://localhost/apiApajhv0/public/v1/getVideos', {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer <?php echo $_SESSION['token']; ?>'
                    }
                })
                if (response.ok) {
                    let responseGetVideos = await response.json()
                    for (var resp in responseGetVideos) {
                        if (responseGetVideos[resp].contentIsOnline == 1) {
                            var btn = '<button type="button" data-id="' + responseGetVideos[resp].id + '" data-online="' + responseGetVideos[resp].contentIsOnline + '" class="btn btn-outline-success btn-sm isOnline">Online</button>'
                        } else {
                            var btn = '<button type="button" data-id="' + responseGetVideos[resp].id + '" data-online="' + responseGetVideos[resp].contentIsOnline + '" class="btn btn-outline-danger btn-sm isOffline">Offline</button>'
                        }
                        var display = '<div class="row"><div class="col-3 text-center"><span>' + responseGetVideos[resp].contentTitle + '</span></div><div class="col-3 text-center"><span>' + responseGetVideos[resp].category[0].category + '</span></div><div class="col-3 text-center"><span>' + responseGetVideos[resp].contentDate + '</span></div><div class="col-3 text-center">' + btn + '</div></div><hr class="wordHr" />'
                        $('.listWord').append(display)
                    }
                } else {
                    console.error('Retour : ', response.status)
                }
            } catch (e) {
                console.log(e)
            }
        }
        getWordList()
    });

    $(document).on('click', '.isOffline', function(event) {
        event.preventDefault();
        $(this).addClass('isOnline')
        $(this).addClass('btn-outline-success')
        $(this).removeClass('btn-outline-danger')
        $(this).removeClass('isOffline')
        $(this).html('Online')
        const ContentIsOnline = async function(data) {
            try {
                let response = await fetch('http://localhost/apiApajhv0/public/v1/online', {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer <?php echo $_SESSION['token']; ?>'
                    },
                    body: JSON.stringify(data)
                })
                if (response.ok) {
                    let responseContentOnline = await response.json()
                } else {
                    console.error('Retour : ', response.status)
                }
            } catch (e) {
                console.log(e)
            }
        }
        ContentIsOnline({
            id: $(this).attr('data-id')
        })
    });

    $(document).on('click', '.isOnline', function(event) {
        event.preventDefault();
        $(this).addClass('isOffline')
        $(this).addClass('btn-outline-danger')
        $(this).removeClass('btn-outline-success')
        $(this).removeClass('isOnline')
        $(this).html('Offline')
        const ContentIsOffline = async function(data) {
            try {
                let response = await fetch('http://localhost/apiApajhv0/public/v1/offline', {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer <?php echo $_SESSION['token']; ?>'
                    },
                    body: JSON.stringify(data)
                })
                if (response.ok) {
                    let responseContentOnline = await response.json()

                } else {
                    console.error('Retour : ', response.status)
                }
            } catch (e) {
                console.log(e)
            }
        }
        ContentIsOffline({
            id: $(this).attr('data-id')
        })
    });

    $(document).on('mouseover', '.isOffline', function() {
        var surLine = '#FADCE6'
        $(this).parent().prev().css('background-color', surLine)
        $(this).parent().prev().prev().css('background-color', surLine)
        $(this).parent().prev().prev().prev().css('background-color', surLine)
    })
    $(document).on('mouseout', '.isOffline', function() {
        $('div.col-3').css('background-color', 'initial')
    })
    $(document).on('mouseover', '.isOnline', function() {
        var surLine = '#677DB7'
        $(this).parent().prev().css('background-color', surLine)
        $(this).parent().prev().prev().css('background-color', surLine)
        $(this).parent().prev().prev().prev().css('background-color', surLine)
    })
    $(document).on('mouseout', '.isOnline', function() {
        $('div.col-3').css('background-color', 'initial')
    })
</script>