<script>
    $(document).ready(function(){

        //Show Data
        function showData(){
            showPreloader()
            $.ajax({
                url: '/information/show', // Your endpoint to fetch user data
                method: 'GET',
                success: function(data) {
                    // Populate the form fields with user data
                    $('#name').val(data.name);
                    $('#propiter').val(data.propiter);
                    $('#phone').val(data.phone);
                    $('#address').val(data.address);
                    $('#description').val(data.description);
                    hidePreloader()
                },
                error: function(error) {
                    console.log('Error fetching user data:', error);
                    hidePreloader()
                }
            });
        }
        showData();

        $("#information").on('submit',function(e){
            e.preventDefault();
            showPreloader()
            let data = $(this).serialize();
            $.ajax({
                url: '/information/update',
                type: 'POST',
                data: data,
                success: function(response){
                    if(response == 'success'){
                        showData();
                        hidePreloader()
                        $('#error-message').html('Information Updated');

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
