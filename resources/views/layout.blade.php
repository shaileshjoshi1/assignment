<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
		<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />

        <!-- Styles -->
      
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            
            <div class="content">
                <div class="title m-b-md">
                    Assignment
                </div>
				<div class="container">
					@yield('content')
				</div>

                
            </div>
        </div>
		<script src="{{ asset('js/app.js') }}" type="text/js"></script>
    </body>
</html>
