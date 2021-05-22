<script>
    // A REVOIR
    $('#city').on('keyup', function(event) {
        event.preventDefault();
        const selectCity = async function(data) {
            try {
                let response = await fetch('http://localhost/apiApajhv0/public/v1/city', {
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
                    $('.cities').empty();
                    if (responseData.length > 0) {
                        $.each(responseData, function(key, type) {
                            var display = '<option id="' + type.id + '" value="' + type.postalCode + '">' + type.cities + '</option><span class="cityId" data-value="' + type.id + '">' + type.id + '</span>'
                            $('.cities').append(display)
                            $('.cities').on('click', function(event) {
                                event.preventDefault();
                                var idCity = $(this).attr('data-value')
                                $('#city').val(idCity)
                                console.log(idCity)
                            });
                        });
                    }
                } else {
                    console.error('Retour : ', response.status)
                }
            } catch (e) {
                console.log(e)
            }
        }
        selectCity({
            postalCode: $(this).val()
        })
    });
</script>