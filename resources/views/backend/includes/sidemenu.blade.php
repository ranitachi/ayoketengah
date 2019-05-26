<!-- Main sidebar -->
			<div class="sidebar sidebar-main sidebar-default">
				<div class="sidebar-content">

					<!-- User menu -->
					<div class="sidebar-user-material">
						<div class="category-content" style="background: #fff">
							<div class="sidebar-user-material-content">
								<img src="{{asset('img/image2.png')}}" class="" alt="" style="height:150px;">
								{{-- <h6>Victoria Baker</h6>
								<span class="text-size-small">Santa Ana, CA</span> --}}
							</div>
														
							<div class="sidebar-user-material-menu">
								<a href="#user-nav" data-toggle="collapse" class="text-primary"><span class="">Akun Pengguna</span> <i class="caret"></i></a>
							</div>
						</div>
						
						<div class="navigation-wrapper collapse" id="user-nav">
							<ul class="navigation">
								<li><a href="#"><i class="icon-user-plus"></i> <span>Profil</span></a></li>
								<li><a href="{{url('logout')}}"><i class="icon-switch2"></i> <span>Logout</span></a></li>
							</ul>
						</div>
					</div>
					<!-- /user menu -->

                    @php
                        $path=Request::path();
                    @endphp
					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

								<!-- Main -->
								<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
								<li class="{{$path=='admin' ? 'active' : ''}}"><a href="{{route('backend.index')}}"><i class="icon-home4"></i> <span>Beranda</span></a></li>
								<li class="{{strpos($path,'berita')!==false ? 'active' : ''}}">
									<a href="#"><i class="icon-newspaper"></i> <span>Articles</span></a>
									<ul>
                                        <li class="{{$path=='admin-berita' ? 'active' : ''}}"><a href="{{route('admin-berita.index')}}">Data Articles</a></li>
                                        <li class="{{strpos($path,'admin-berita/')!==false ? 'active' : ''}}"><a href="{{route('admin-berita.form',-1)}}">Tambah Articles</a></li>
									</ul>
								</li>
								<li class="{{strpos($path,'kategori')!==false ? 'active' : ''}}">
									<a href="#"><i class="icon-list"></i> <span>Kategori Artikel</span></a>
									<ul>
                                        <li class="{{strpos($path,'admin-kategori')!==false ? 'active' : ''}}"><a href="{{route('admin-kategori.index')}}">Data Kategori</a></li>
									</ul>
								</li>
								<li class="{{strpos($path,'slider')!==false ? 'active' : ''}}">
									<a href="#"><i class="icon-stack2"></i> <span>Slider</span></a>
									<ul>
                                        <li class="{{$path=='admin-slider' ? 'active' : ''}}"><a href="{{route('admin-slider.index')}}">Data Slider</a></li>
                                        <li class="{{strpos($path,'admin-slider/')!==false ? 'active' : ''}}"><a href="{{route('admin-slider.form',-1)}}">Tambah Slider</a></li>
									</ul>
								</li>
								<li class="{{strpos($path,'galeri')!==false ? 'active' : ''}}">
									<a href="#"><i class="icon-images2"></i> <span>Galeri</span></a>
									<ul>
                                        <li class="{{$path=='admin-galeri' ? 'active' : ''}}"><a href="{{route('admin-galeri.index')}}">Data Galeri</a></li>
                                        <li class="{{strpos($path,'admin-galeri/')!==false ? 'active' : ''}}"><a href="{{route('admin-galeri.form',-1)}}">Tambah Galeri</a></li>
									</ul>
                                </li>
                                
                                <li class="navigation-header"><span>Tentang AyoKeTengah</span> <i class="icon-menu" title="Data Informasi"></i></li>
                                <li class="{{strpos($path,'about-us')!==false ? 'active' : ''}}"><a href="{{url('tentang/about-us')}}"><i class="icon-grid5"></i> <span>About Us</span></a></li>
                                
								
							
                                <li class="navigation-header"><span>Master Data</span> <i class="icon-menu" title="Data Master"></i></li>

								
								@if (Auth::user()->level==0)
								<li class="{{strpos($path,'user')!==false ? 'active' : ''}}">
									<a href="#"><i class="icon-users"></i> <span>Data User</span></a>
									<ul>
										<li class="{{$path=='admin-user' ? 'active' : ''}}"><a href="{{route('admin-user.index')}}">Data User</a></li>
										<li class="{{strpos($path,'admin-user/')!==false ? 'active' : ''}}"><a href="{{route('admin-user.form',-1)}}">Tambah Data User</a></li>
									</ul>
								</li>
								@endif
                                <li><a href="{{route('admin-kontak')}}"><i class="icon-pin"></i> <span>Kontak</span></a></li>
							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->