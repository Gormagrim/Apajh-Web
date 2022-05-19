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
</script>