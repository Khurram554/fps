<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Faran Pubilc School - @yield('title')</title>
        
        
                   
        <!-- Custom CSS -->  
        <link href="{{ asset('/css/style.css') }}" rel="stylesheet">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_token" content="{{csrf_token()}}" />
{{--         
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> --}}

        <link rel="stylesheet" href="{{ asset("/css/bootstrap.min.css") }}">
        <script src="{{ asset("/js/jquery.js")}}"></script>
        <script src="{{ asset("/js/bootstrap.min.js")}} "></script>
        <script src="{{ asset('/js/main.js') }}"></script> 

        
    </head>
    <body>
        
            <header class="header">
                <div class="container">
                    <h1>Faran Public School</h1>
                    <marquee behavior="scroll" direction="left">School Management System</marquee>
                </div>
            </header>
            <div class="mynavigation">
                <div style="width:1000px; margin:0px auto;">
                        <nav class="navbar navbar-inverse">
                                <div class="container-fluid">
                                  <div class="navbar-header">
                                   
                                  </div>
                                  <ul class="nav navbar-nav">
                                    <li><a href="{{ url('/printpage') }}">Print</a></li>
                                    <li><a href="{{ url('/add-student') }}">Add Student</a></li>
                                    <li><a href="{{ url('/operation') }}">Operation</a></li>
                                    <li><a href="{{ url('/bank') }}">Bank</a></li>
                                  </ul>
                                </div>
                              </nav>
                </div>
            </div>
        
        @show

        <div class="container">
            @yield('content')
        </div>


        <div class="footer">
                <p>&copy; Faran Public School <?php echo Date("Y"); ?></p>
        </div>
    </body>
</html>