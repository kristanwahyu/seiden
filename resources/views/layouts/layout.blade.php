<!doctype html>
<html lang="en">
<head>
	@include('includes.head')

	@stack('style')
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		@include('includes.navbar')
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		@yield('sidebar')
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			@yield('content')
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		{{--<footer>
			<div class="container-fluid text-center">
				<p class="copyright">Globalindo Express Cargo</p>
			</div>
		</footer>--}}
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	@include('includes.scripts')

	@stack('script')
</body>

</html>
