<script>

$(document).ready(function () {


    //Create or Update
    $('#districtForm').on('submit', function (e) {
        e.preventDefault();
        showPreloader()
        let data = $(this).serialize();
        let id = $('#id').val();
        let url = id ? `/district/update/${id}` : '/district/create';
        let type = id ? 'PUT' : 'POST';
        $.ajax({
                url: url,
                type: type,
                data: data,
                success: function(response){
                    if(response === 'Created'){
                        hidePreloader()
                        $('#error-message').html('Created');
                        $('.table').load(location.href + " .table");


                    }else if(response === 'Updated'){
                        hidePreloader()
                        $('#error-message').html('Updated');
                        $('.table').load(location.href + " .table");
                        $('#submitBtn').text("Create")
                    }
                    else{
                        $('#error-message').html('Failed');
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

            $('#districtForm')[0].reset();


    })

//Edit btn
    $(document).on('click', '.editBtn', function(e){
        e.preventDefault();
        let id = $(this).data('id')
        let name = $(this).data('name')
        $('#id').val(id)
        $('#name').val(name)
        $('#submitBtn').text("Update")
    })


//delete btn
    $(document).on('click', '.delBtn', function(e){
        e.preventDefault();
        showPreloader()
        let id = $(this).data('id')

        if(confirm('Sure?')){
            $.ajax({
            url : '/district/delete',
            type:'POST',
            data:{'id':id},
            success: function(response){
                if(response.status == 'success'){
                    $('.table').load(location.href + " .table");
                    $('#error-message').html("District Deleted");
                    hidePreloader()
                }else{
                    hidePreloader()
                }
            }
        })
        }

    })

    //Pagination
$(document).on('click', '.pagination a',function(e){
    e.preventDefault();
    let page = $(this).attr('href').split('page=')[1]
    pagination(page)

})

function pagination(page) {
    $.ajax({
        url: '/district/pagination?page='+page,
        success: function(response){
            $('.table-data').html(response)
        }
    })
}


//search
$(document).on('keyup', '#search',function(e){
    e.preventDefault();
    let text = $(this).val();
    $.ajax({
        url: '/district/search',
        type:'GET',
        data:{'text':text},
        success: function(response){
            $('.table-data').html(response)
            if(response.status == '404'){
                console.log(response.status);
                $('.table-data').html("<span class='text-danger text-center'>No District Found</span>");
            }
        }
    })

})


}) //Document


</script>
