<script>
    $(document).ready(function(){

        //Show Data
        function showData(){
            showPreloader()
            $.ajax({
                url: '/profile/show', // Your endpoint to fetch user data
                method: 'GET',
                success: function(data) {
                    // Populate the form fields with user data
                    $('#name').val(data.name);
                    $('#email').val(data.email);
                    $('#phone').val(data.phone);
                    hidePreloader()
                },
                error: function(error) {
                    console.log('Error fetching user data:', error);
                    hidePreloader()
                }
            });
        }
        showData();

        $("#profile").on('submit',function(e){
            e.preventDefault();
            showPreloader()
            let data = $(this).serialize();
            $.ajax({
                url: '/profile/update',
                type: 'POST',
                data: data,
                success: function(response){
                    if(response == 'success'){
                        showData();
                        hidePreloader()
                        $('#error-message').html('Profile Updated');

                    }else{
                        $('#error-message').html('Failed to update');
                        hidePreloader()
                    }
                },
                error: function(xhr, status, error) {
                    hidePreloader()
                    // Handle AJAX errors here if needed
                    console.error(xhr, status, error);
                    $('#error-message').html(JSON.parse(xhr.responseText).message);
                }
            });

        })

    });
    </script>
