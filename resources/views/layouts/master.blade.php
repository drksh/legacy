<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Darkshare - By @jstoone</title>

{{--	<link href="{{ elixir('css/application.css') }}" rel="stylesheet">--}}
    <link rel="stylesheet" href="{{ url('css/application.css') }}"/>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
    <div id="container" class="container-fluid">
        <div class="col-md-8 col-md-offset-2">
            <div class="row">
                @include('layouts.partials.header')
            </div>

            @include('flash::message')

            <div class="row">
                @yield('content')
            </div>

        </div>
    </div>

	<div id="footer" class="row">
		@include('layouts.partials.footer')
	</div>
	<!-- Scripts -->
	{{--<script src="{{ elixir('js/application.js') }}"></script>--}}
    <script src="{{ url('js/application.js') }}"></script>
</body>
</html>
