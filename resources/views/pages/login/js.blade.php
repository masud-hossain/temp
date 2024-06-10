<script>
    $(document).ready(function(){
        $('#login').on('submit',function(e){
            e.preventDefault();
            showPreloader()
            let data = $(this).serialize();
            $.ajax({
                url: '/login',
                type: 'POST',
                data: data,
                success: function(response){
                    if(response == 'success'){
                        window.location.href = '/dashboard';
                        hidePreloader()
                    }else{
                        $('#error-message').html('Invalid email and password');
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
        });
    });
    </script>
