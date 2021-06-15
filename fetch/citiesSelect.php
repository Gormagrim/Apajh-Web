<script>
    $('#city').on('keyup', function(event) {
        event.preventDefault();
        $('#cities').css('visibility', 'visible')
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
                            var display = '<option class="cityOption" data-value="' + key + '" id="' + type.id + '" value="' + type.id + '">' + type.cities + '</option>'
                            $('.cities').append(display)

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
    $('#cities').on('change', function(event) {
        event.preventDefault();
        var idCity = $(this).val()
        $('.cityId').val(idCity)
    });
</script>