@extends('layouts.front',['kontak'=>$kontak])
@section('title')
Detail Artikel
@endsection
@section('konten')
        <div class="rs-breadcrumbs breadcrumbs-overlay ungu-bg" style="padding:20px 0 20px !important;">
		    <div class="breadcrumbs-inner">
		        <div class="container">
		            <div class="row">
		                <div class="col-md-12 text-center">
		                    <h1 class="page-title" style="margin:10px 0 20px">Detail articles</h1>
		                    <ul>
		                        <li>
		                            <a class="active" href="{{url('/')}}">Beranda</a>
		                        </li>
		                        <li>
		                            <a class="active" href="{{url('articles')}}">Artikel</a>
		                        </li>
		                        <li>Detail Artikel</li>
		                    </ul>
		                </div>
		            </div>
		        </div>
		    </div><!-- .breadcrumbs-inner end -->
		</div>
        <div class="single-blog-details sec-spacer">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-12" style="text-align:justify">
                        @if ($data)
                        
                            <div class="single-image">
                                <img src="{{asset($data->cover)}}" alt="{{$data->judul}}">
                            </div>
                            <div class="share-section">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 life-style">
                                        <span class="author"> 
                                            <a href="#"><i class="fa fa-user-o" aria-hidden="true"></i> Admin </a>
                                        </span> 
                                        <span class="comment"> 
                                            <a href="#"> 
                                                <i class="fa fa-eye" aria-hidden="true"></i> {{($data) ? $data->views : 0}}
                                            </a>
                                        </span>
                                        <span class="date">
                                            <i class="fa fa-calendar" aria-hidden="true"></i> {{($data) ? tglIndo($data->created_at) : ''}}
                                        </span>
                                        
                                    </div>
                                    
                                </div>
                            </div><!-- .share-section End -->
                            <h3>{{$data->judul}}</h3>
                            {!!$data->deskripsi!!}
                        @else
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 error-page-message text-center">
                                <div class="error-page">
                                    <h3>Data Detail Artikel Tidak Teredia</h3>
                                </div>
                            </div>
                        @endif
                        

						<div class="share-section2">
							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-12">
									<span> Share Informasi Ini : </span>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-12">
									<ul class="share-link">
										<li><a href="#"> <i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a></li>
										<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a></li>
										<li><a href="#"><i class="fa fa-google" aria-hidden="true"></i> Google</a></li>
									</ul>
								</div>
							</div>
						</div><!-- .share-section2 End -->

						
						                              
					</div>
                    <div class="col-lg-4 col-md-12">
                        <div class="sidebar-area">
                            <div class="search-box">
                                <h3 class="title">Cari Artikel</h3>
                                <div class="box-search">
                                    <input class="form-control" placeholder="Masukan Judul Artikel ..." name="srch-term" id="srch-term" type="text">
                                    <button class="btn btn-default" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </div>
                            </div>
                            <div class="latest-courses">
                                <h3 class="title">Artikel Lain</h3>
                                @foreach ($articles as $item)
                                    <div class="post-item">
                                        <div class="post-img">
                                            <a href="javascript:detail({{$item->id}},'{{$item->judul_slug}}')"><img src="{{asset($item->cover)}}" alt="" title="{{$item->judul}}" style="width:130px;"></a>
                                        </div>
                                        <div class="post-desc">
                                            <h4><a href="javascript:detail({{$item->id}},'{{$item->judul_slug}}')">{{potongtext($item->judul,10)}}</a></h4>
                                            <span class="duration"> 
                                                <i class="fa fa-calendar" aria-hidden="true"></i> {{tglIndoSingkat($item->created_at)}}
                                            </span> 
                                            <span class="price"><i class="fa fa-eye"></i> <span>{{$item->views}}</span></span>
                                        </div>
                                    </div>
                                @endforeach
                            </div><!-- .cate-box end -->
                            
                        </div><!-- .sidebar-area end --> 
                    </div>             
				</div>
			</div>
		</div>
@endsection
@section('footscript')

@endsection