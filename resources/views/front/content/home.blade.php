<!-- Services Start -->
       
		<!-- Services End -->

        <!-- About Us Start -->
        @include('front.includes.slider')
        <div id="rs-about" class="rs-about sec-spacer" style="padding-bottom:50px;">
            <div class="container">
                <div class="sec-title mb-50 text-center">
                    <h2>TENTANG KAMI</h2>      
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-12">
                        <div class="about-img rs-animation-hover">
							<img src="{{asset('img/image2.png')}}" alt="img02"/>
							<div class="overly-border"></div>
						</div>
                    </div>
                    <div class="col-lg-9 col-md-12">
                    	<div class="about-desc">
                		    <h3>#AyoKeTengah</h3>      
                    	</div>
						<div id="accordion" class="rs-accordion-style1">
						    <div class="card">
						        <div class="card-header" id="headingOne">
						            <h3 class="acdn-title" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						          		Tentang Kami
						            </h3>
						        </div>
						        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
						            <div class="card-body">
                                        @if (isset($profil['about-us']))
                                            {{potongtext($profil['about-us']->deskripsi,80)}} ...
                                        @else
                                            ...
                                        @endif
						            </div>
                                    <a href="{{url('about-us')}}" class="btn btn-sm btn-danger pull-right">More About Us</a>
						        </div>
						    </div>
						    
						</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About Us End -->
        <hr>
  <!-- Latest News Start -->
        <div id="rs-latest-news" class="rs-latest-news sec-spacer" style="padding-top:50px;">
			<div class="container">
				<div class="sec-title mb-50 text-center">
                    <h2>ARTIKEL</h2>      
                </div>
				<div class="row">
			        <div class="col-md-6">
						<div class="news-normal-block">
                            @foreach ($berita as $idx=> $item)
                                @if ($idx==0)                                    
                                    <div class="news-img">
                                        <a href="javascript:detail({{$item->id}},'{{$item->judul_slug}}')">
                                            <img src="{{asset($item->cover)}}" alt="{{$item->judul}}" />
                                        </a>
                                    </div>
                                    <div class="news-date">
                                        <i class="fa fa-calendar-check-o"></i>
                                        <span>{{tglIndo($item->created_at)}}</span>
                                        &nbsp;&nbsp;&nbsp;
                                        <i class="fa fa-tag"></i>
                                        <span>{{$item->kat->kategori}}</span>
                                    </div>
                                    <h4 class="news-title"><a href="javascript:detail({{$item->id}},'{{$item->judul_slug}}')">{{$item->judul}}</a></h4>
                                    <div class="news-desc">
                                        <p>
                                            {{potongtext($item->deskripsi,20)}}
                                        </p>
                                    </div>
                                    <div class="news-btn">
                                        <a href="javascript:detail({{$item->id}},'{{$item->judul_slug}}')">Selengkapnya</a>
                                    </div>
                                @endif
                            @endforeach
		                </div>
			        </div>
			        <div class="col-md-6">
			        	<div class="news-list-block">
                            @foreach ($berita as $idx=> $item)
                                @if ($idx!=0)
                                
                                    <div class="news-list-item">
                                        <div class="news-img">
                                            <a href="javascript:detail({{$item->id}},'{{$item->judul_slug}}')">
                                                <img src="{{asset($item->cover)}}" alt="" />
                                            </a>
                                        </div>			
                                        <div class="news-content">
                                            <h5 class="news-title"><a href="javascript:detail({{$item->id}},'{{$item->judul_slug}}')">{{$item->judul}}</a></h5>
                                            <div class="news-date">
                                                <i class="fa fa-calendar-check-o"></i>
                                                <span>{{tglIndo($item->created_at)}}</span>
                                                &nbsp;&nbsp;&nbsp;
                                                <i class="fa fa-tag"></i>
                                                <span>{{$item->kat->kategori}}</span>
                                            </div>
                                            <div class="news-desc">
                                                <p>
                                                    {{potongtext($item->deskripsi,10)}} ...
                                                </p>
                                            </div>
                                        </div>			        			
                                    </div>
                                @endif
                            @endforeach
			        		
			        	</div>
			        </div>
			    </div>
			</div>
        </div>
        <!-- Latest News End -->
<div id="rs-testimonial" class="rs-testimonial bg5 sec-spacer">
			<div class="container">
				<div class="sec-title mb-50 text-center">
					<h2 class="white-color">OPINIONS</h2>      
					
				</div>
				<div class="row">
			        <div class="col-md-12">
						<div  class="rs-carousel owl-carousel" data-loop="true" data-items="2" data-margin="30" data-autoplay="true" data-autoplay-timeout="5000" data-smart-speed="1200" data-dots="true" data-nav="true" data-nav-speed="false" data-mobile-device="1" data-mobile-device-nav="true" data-mobile-device-dots="true" data-ipad-device="2" data-ipad-device-nav="true" data-ipad-device-dots="true" data-md-device="2" data-md-device-nav="true" data-md-device-dots="true">
			                <div class="testimonial-item">
			                    <div class="testi-img">
			                        <img src="{{asset('front/images/testimonial/1.jpg')}}" alt="Jhon Smith">
			                    </div>
			                    <div class="testi-desc">
			                        <h4 class="testi-name">Luise Henrikes</h4>
			                        <p>
			                            Etiam non elit nec augue tempor gravida et sed velit. Aliquam tempus eget lorem ut malesuada. Phasellus dictum est sed libero posuere dignissim.
			                        </p>
			                    </div>
			                </div>
					        <div class="testimonial-item">
					            <div class="testi-img">
					                <img src="{{asset('front/images/testimonial/2.jpg')}}" alt="Jhon Smith">
					            </div>
					            <div class="testi-desc">
					                <h4 class="testi-name">Aliana D’suza</h4>
					                <p>
					                    Tempor non elit nec augue nec gravida et sed velit. Aliquam tempus eget lorem ut malesuada. Phasellus dictum est sed libero posuere dignissim.
					                </p>
					            </div>
					        </div>
					        <div class="testimonial-item">
					            <div class="testi-img">
					                <img src="{{asset('front/images/testimonial/3.jpg')}}" alt="Jhon Smith">
					            </div>
					            <div class="testi-desc">
					                <h4 class="testi-name">Aliana D’suza</h4>
					                <p>
					                    Tempor non elit nec augue nec gravida et sed velit. Aliquam tempus eget lorem ut malesuada. Phasellus dictum est sed libero posuere dignissim.
					                </p>
					            </div>
					        </div>
					        <div class="testimonial-item">
					            <div class="testi-img">
					                <img src="{{asset('front/images/testimonial/4.jpg')}}" alt="Jhon Smith">
					            </div>
					            <div class="testi-desc">
					                <h4 class="testi-name">Aliana D’suza</h4>
					                <p>
					                    Tempor non elit nec augue nec gravida et sed velit. Aliquam tempus eget lorem ut malesuada. Phasellus dictum est sed libero posuere dignissim.
					                </p>
					            </div>
					        </div>
					        <div class="testimonial-item">
					            <div class="testi-img">
					                <img src="{{asset('front/images/testimonial/5.jpg')}}" alt="Jhon Smith">
					            </div>
					            <div class="testi-desc">
					                <h4 class="testi-name">Aliana D’suza</h4>
					                <p>
					                    Tempor non elit nec augue nec gravida et sed velit. Aliquam tempus eget lorem ut malesuada. Phasellus dictum est sed libero posuere dignissim.
					                </p>
					            </div>
					        </div>
			            </div>
			        </div>
			    </div>
			</div>
        </div>
        
		<!-- Team Start -->
        <div id="rs-team" class="rs-team sec-color sec-spacer">
            <div class="container">
                <div class="sec-title mb-50 text-center">
                    <h2>OUR TEAM</h2>      
                </div>
				<div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30" data-autoplay="false" data-autoplay-timeout="5000" data-smart-speed="1200" data-dots="true" data-nav="true" data-nav-speed="false" data-mobile-device="1" data-mobile-device-nav="true" data-mobile-device-dots="true" data-ipad-device="2" data-ipad-device-nav="true" data-ipad-device-dots="true" data-md-device="3" data-md-device-nav="true" data-md-device-dots="true">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="{{asset('front/images/team/1.jpg')}}" alt="team Image" />
							<div class="normal-text">
								<h3 class="team-name">ABD Rashid Khan</h3>
                                <span class="subtitle">Vice Chancellor</span>
							</div>
                        </div>
                        <div class="team-content">
							<div class="overly-border"></div>
                            <div class="display-table">
                                <div class="display-table-cell">
									<h3 class="team-name"><a href="teachers-single.html">ABD Rashid Khan</a></h3>
									<span class="team-title">Vice Chancellor</span>
                                    <p class="team-desc">Entrusted with planning, implementation and evaluation.</p>
									<div class="team-social">
										<a href="#" class="social-icon"><i class="fa fa-facebook"></i></a>
										<a href="#" class="social-icon"><i class="fa fa-google-plus"></i></a>
										<a href="#" class="social-icon"><i class="fa fa-twitter"></i></a>
										<a href="#" class="social-icon"><i class="fa fa-pinterest-p"></i></a>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="team-item">
                        <div class="team-img">
                            <img src="{{asset('front/images/team/2.jpg')}}" alt="team Image" />
							<div class="normal-text">
								<h3 class="team-name">Luyes Figery</h3>
                                <span class="subtitle">A. Professor</span>
							</div>
                        </div>
                        <div class="team-content">
							<div class="overly-border"></div>
                            <div class="display-table">
                                <div class="display-table-cell">
                                    <h3 class="team-name"><a href="teachers-single.html">Luyes Figery</a></h3>
                                    <span class="team-title">A. Professor</span>
                                    <p class="team-desc">Entrusted with planning, implementation and evaluation.</p>
									<div class="team-social">
										<a href="#" class="social-icon"><i class="fa fa-facebook"></i></a>
										<a href="#" class="social-icon"><i class="fa fa-google-plus"></i></a>
										<a href="#" class="social-icon"><i class="fa fa-twitter"></i></a>
										<a href="#" class="social-icon"><i class="fa fa-pinterest-p"></i></a>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="team-item">
                        <div class="team-img">
                            <img src="{{asset('front/images/team/3.jpg')}}" alt="team Image" />
							<div class="normal-text">
								<h3 class="team-name">Mr. Mahabub Alam</h3>
                                <span class="subtitle">Assistant Professor</span>
							</div>
                        </div>
                        <div class="team-content">
							<div class="overly-border"></div>
                            <div class="display-table">
                                <div class="display-table-cell">
                                    <h3 class="team-name"><a href="teachers-single.html">Mr. Mahabub Alam</a></h3>
                                    <span class="team-title">Assistant Professor</span>
                                    <p class="team-desc">Entrusted with planning, implementation and evaluation.</p>
									<div class="team-social">
										<a href="#" class="social-icon"><i class="fa fa-facebook"></i></a>
										<a href="#" class="social-icon"><i class="fa fa-google-plus"></i></a>
										<a href="#" class="social-icon"><i class="fa fa-twitter"></i></a>
										<a href="#" class="social-icon"><i class="fa fa-pinterest-p"></i></a>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
        <!-- Team End -->

       
       

		<!-- Testimonial Start -->
        
        <!-- Testimonial End -->
	