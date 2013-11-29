<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Mildy</title>
		{{ HTML::style('css/bootstrap-theme.css') }}
		{{ HTML::style('css/bootstrap.css') }}
		{{ HTML::style('css/style.css') }}
		{{ HTML::script('js/jquery.min.js')}}
		{{ HTML::script('js/bootstrap.js'); }}
	</head>

	<body>
		@yield('body')
	</body>
</html>