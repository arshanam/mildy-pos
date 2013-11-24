<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Mildy</title>
		{{ HTML::style('css/bootstrap-theme.css') }}
		{{ HTML::style('css/bootstrap.css') }}
	</head>

	<body>
		<nav class="navbar navbar-default" role="navigation">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/">Mildy</a>
			</div>

			<div class="collapse navbar-collapse" id="mainNavbar">
				
			</div>
		</nav>
		<div class="container">
			@yield('content')
		</div>
		{{ HTML::script('js/jquery.min.js')}}
		{{ HTML::script('js/bootstrap.js'); }}
	</body>
</html>