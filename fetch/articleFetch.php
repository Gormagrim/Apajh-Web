<script>
    $('.plus').on('click', function() {
        const articleView = async function(data) {
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
        articleView({
            id_content: $(this).attr('data-id')
        })
    });
    $(document).ready(function() {
        const getProUsers = async function(data) {
            try {
                let response = await fetch('http://localhost/apiApajhv0/public/v1/proUsers', {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer <?php echo $_SESSION['token']; ?>'
                    }
                })
                if (response.ok) {
                    let responseGetUser = await response.json()
                    for (var resp in responseGetUser) {
                        var src = responseGetUser[resp].user_photo == null ? 'assets/img/flower2.png' : 'http://localhost/apiApajhv0/public/upload/user/' + responseGetUser[resp].user_photo.fileName
                        var pro = '<div class="row ourTeam"><div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 text-center"><img class="team" src="' + src +'" alt="Fleur de l\'Apajh" class="img-thumbnail"></div><div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 teamName text-center"><span>' + responseGetUser[resp].user_description.firstname + ' ' + responseGetUser[resp].user_description.lastname.toUpperCase() + '</span><br /><span class="job">' + responseGetUser[resp].user_description.job + '</span></div></div>'
                        $('.somePro').append(pro)
                    }
                } else {
                    console.error('Retour : ', response.status)
                }
            } catch (e) {
                console.log(e)
            }
        }
        getProUsers()
    });
</script>