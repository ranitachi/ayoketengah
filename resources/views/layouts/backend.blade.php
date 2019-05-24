<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
        @yield('title') | 
        Admin PPID Kabupaten Tangerang
    </title>

	<!-- Global stylesheets -->
	@include('backend.includes.link')

</head>

<body>

	@include('backend.includes.navbar')


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			@include('backend.includes.sidemenu')


			<!-- Main content -->
			<div class="content-wrapper">

				{{-- @include('backend.includes.header') --}}

                @yield('header')
				<!-- Content area -->
				<div class="content">

					

					@yield('konten')


					@include('backend.includes.footer')

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
</html>
@yield('script')
@yield('modal')
