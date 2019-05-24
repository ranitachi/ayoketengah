<nav class="right_menu_togle">
        	<div class="close-btn"><span id="nav-close" class="text-center">x</span></div>
            <div class="canvas-logo">
                <a href="index.html"><img src="{{asset('front/images/logo-footer.png')}}" alt="logo"></a>
            </div>
        	<ul class="sidebarnav_menu list-unstyled main-menu">
                <!--Home Menu Start-->
                <li class="current-menu-item"><a href="{{url('/')}}">Home</a></li>
                <!--Home Menu End-->
                
                <!--About Menu Start-->
                <li class=""><a href="{{url('about-us')}}">About Us</a></li>
                <!--About Menu End-->
                
               
                <li><a href="{{url('articles')}}">Articles<span class="icon"></span></a></li>
                <li><a href="{{url('gallery')}}">Gallery<span class="icon"></span></a></li>
                <li><a href="{{url('contact-us')}}">Contact Us<span class="icon"></span></a></li>
        	</ul>
            <div class="search-wrap"> 
                <label class="screen-reader-text">Search for:</label> 
                <input type="search" placeholder="Search..." name="s" class="search-input" value=""> 
                <button type="submit" value="Search"><i class="fa fa-search"></i></button>
            </div>
        </nav>