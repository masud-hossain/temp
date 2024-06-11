<script>

    $(document).ready(function () {

        //District to thana
        $(document).on('change', '.districtClick', function(e){
            e.preventDefault();
            showPreloader()
            var id = $(this).val();
            $.ajax({
                url:'/supplier/show/thana',
                type:'get',
                data:{'id':id},
                success:function(response){
                    hidePreloader()
                    $('#thana_id').empty();
                    $.each(response, function(index, thana) {
                        $('#thana_id').append('<option value="'+ thana.id +'">'+ thana.name +'</option>');
                    });
                },
                    error: function(xhr, status, error) {
                        hidePreloader()
                        // Handle AJAX errors here if needed
                        console.error(xhr, status, error);
                        $('#error-message').html(JSON.parse(xhr.responseText).message);
                    }
            })
        })


        //Create or Update
        $('#supplierForm').on('submit', function (e) {
            e.preventDefault();
            showPreloader()
            let data = $(this).serialize();
            let id = $('#id').val();
            let url = id ? `/supplier/update/${id}` : '/supplier/create';
            let type = id ? 'PUT' : 'POST';
            $.ajax({
                    url: url,
                    type: type,
                    data: data,
                    success: function(response){
                        if(response === 'Created'){
                            hidePreloader()
                            $('#error-message').html('তৈরী হয়েছে');
                            $('.table').load(location.href + " .table");


                        }else if(response === 'Updated'){
                            hidePreloader()
                            $('#error-message').html('আপডেট হয়েছে');
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

                $('#supplierForm')[0].reset();


        })

    //Edit btn
        $(document).on('click', '.editBtn', function(e){
            e.preventDefault();
            let id = $(this).data('id')
            let name = $(this).data('name')
            let district_id = $(this).data('district_id')
            let thana_id = $(this).data('thana_id')
            let address = $(this).data('address')
            let phone = $(this).data('phone')
            let status = $(this).data('status')
            console.log(thana_id);
            $('#id').val(id)
            $('#name').val(name)
            $('#district_id').val(district_id)
            $('#thana_id').val(thana_id)
            $('#address').val(address)
            $('#phone').val(phone)
            $('#status').prop('checked', status == 1);
            $('#submitBtn').text("Update")
        })


    //delete btn
        $(document).on('click', '.delBtn', function(e){
            e.preventDefault();
            showPreloader()
            let id = $(this).data('id')

            if(confirm('Sure?')){
                $.ajax({
                url : '/supplier/delete',
                type:'POST',
                data:{'id':id},
                success: function(response){
                    if(response.status == 'success'){
                        $('.table').load(location.href + " .table");
                        $('#error-message').html("ব্যাপারী রিমুভ হয়েছে");
                        $('#supplierForm')[0].reset();
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
            url: '/supplier/pagination?page='+page,
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
            url: '/supplier/search',
            type:'GET',
            data:{'text':text},
            success: function(response){
                $('.table-data').html(response)
                if(response.status == '404'){
                    console.log(response.status);
                    $('.table-data').html("<span class='text-danger text-center'>কোন ব্যাপারী পাওয়া জায়নি</span>");
                }
            }
        })

    })




    }) //Document


    </script>
