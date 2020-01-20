<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sicovis</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset("bootstrap/css/bootstrap.min.css")}}">
        <link rel="stylesheet" href="{{ asset("css/toastr.css")}}">

    </head>
    <body>
    	<div class="container">

            @yield('content')
    		
    	</div>
        
        <script src="{{asset('js/appORIGINAL.js')}}"></script>
    </body>
</html>
