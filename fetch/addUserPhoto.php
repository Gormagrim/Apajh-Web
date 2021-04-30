<script>
    $('.addPhoto').on('change', function(event) {
        event.preventDefault();
        addUserPhoto(event)
    });
    const addUserPhoto = async function(event) {
        const formData = new FormData();
        const file = event.target.files[0];
        formData.set('file', file);
        try {
            let response = await fetch('http://localhost/apiApajhv0/public/v1/userphoto', {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'multipart/form-data',
                    'Authorization': 'Bearer <?php echo $_SESSION['token']; ?>'
                },
                body: formData
            })
            if (response.ok) {
                let responseData = await response.json()
            } else {
                console.error('Retour : ', response.status)
            }
        } catch (e) {
            console.log(e)
        }
        try {
            let response = await fetch('http://localhost/apiApajhv0/public/v1/userphoto', {
                method: 'POST',
                headers: {
                    'Authorization': 'Bearer <?php echo $_SESSION['token']; ?>'
                },
                body: formData
            })
            if (response.ok) {
                let responseData = await response.json()
                location.reload();
                console.log(responseData.file)
            } else {
                let responseData = await response.json()
                console.error('Retour : ', response.status)
                $('.userPhotoError').append(responseData.file)
            }
        } catch (e) {
            console.log(e)
        }
    }
</script>