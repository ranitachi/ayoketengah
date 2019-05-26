<!DOCTYPE html>
<html lang="zxx">
    <head>
        <!-- meta tag -->
        <meta charset="utf-8">
        <title>
            @yield('title') - AyoKeTengah
        </title>
        @include('front.includes.link')
    </head>
    <body class="home1">
        <!--Preloader area start here-->
        {{-- <div class="book_preload">
            <div class="book">
                <div class="book__page"></div>
                <div class="book__page"></div>
                <div class="book__page"></div>
            </div>
        </div> --}}
		<!--Preloader area end here-->
		
        @include('front.includes.header',['kontak'=>$kontak])
		
		<!-- Slider Area Start -->
        
        <!-- Slider Area End -->
		
		@yield('konten')
        <!-- Footer Start -->
       @include('front.includes.footer')
        <!-- Footer End -->

        <!-- start scrollUp  -->
        <div id="scrollUp">
            <i class="fa fa-angle-up"></i>
        </div>
		
		<!-- Canvas Menu start -->
        @include('front.includes.menu-mini')
        <!-- Canvas Menu end -->
        
        <!-- Search Modal Start -->
        <div aria-hidden="true" class="modal fade search-modal" role="dialog" tabindex="-1">
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true" class="fa fa-close"></span>
	        </button>
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="search-block clearfix">
                        <form>
                            <div class="form-group">
                                <input class="form-control" placeholder="eg: Computer Technology" type="text">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Search Modal End --> 
        
        @include('front.includes.script')
    </body>
    @yield('footscript')
</html>