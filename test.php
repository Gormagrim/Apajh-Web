<input list="cities" type="text" class="form-control information" data-id="" id="city" name="city" placeholder="Tapez votre code postal" value="" />
<datalist id="cities" class="cities"></datalist>
<input type="text" class="test" value="">
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
                            var display = '<option class="cityOption" data-value="' + key + '" id="' + type.id + '" value="' + type.postalCode + '">' + type.cities + '</option>'
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
    $('.cityOption').click(function() {
        var idCity = $(this).attr('data-value')
        $('.test').val(idCity)
    });
</script>