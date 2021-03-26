<script>
    $('#addPhoto').on('change', function(event) {
        event.preventDefault();
        addUserPhoto(event)
    });
    const addUserPhoto = async function(event) {
        const file = event.target.files[0];
        const formData = new FormData();
        formData.set('file', file);
        try {
            let response = await fetch('http://localhost/apiApajhv0/public/v1/userphoto', {
                method: 'POST',
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
    }
</script>