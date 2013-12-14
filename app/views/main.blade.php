@extends('master')

@section('body')
	<nav class="navbar navbar-default" role="navigation">
		<div class="container">
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
				@if (Auth::check())
					<ul class="nav navbar-nav">
						<li ><a href="/staffs">Staffs</a></li>
						<li ><a href="/products">Products</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a id="logout-link" href="/logout">Logout</a>
							<script>
								$('#logout-link').click(function(e) {
									e.preventDefault();
									$.post('/logout', function() {
										window.location = '/';
									});
								});
							</script>
						</li>
					</ul>
				@endif
			</div>
		</div>
	</nav>
	<div class="container">
		@yield('content')
	</div>
@endsection