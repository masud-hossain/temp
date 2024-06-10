<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
        <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
             $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
    </head>
<body class="sb-sidenav-fixed">
    <x-nav/>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <x-sidebar/>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <div class="row py-2">
                        {{$slot}}
                    </div>
                </div>
            </main>
            <x-footer/>
        </div>
    </div>
    <script src="{{asset('assets/js/toogler.js')}}"></script>
    @yield('js')
    <script>
        $(document).ready(function(){

            $('#logout').on('submit',function(e){
                e.preventDefault()
                showPreloader()
                $.ajax({
                    url: '/logout',
                    type: 'POST',
                    success: function(response){
                        console.log(response);
                        if(response == 'Yes'){
                            window.location.href = '/';
                            hidePreloader()
                        }else{
                            hidePreloader()
                        }
                    }
                })
            })
        })
        </script>

</body>
</html>
<x-preloader/>

