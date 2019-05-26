@extends('layouts.front',['kontak'=>$kontak])
@section('title')
    About US
@endsection
@section('konten')

    <div class="rs-history sec-spacer">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-12 col-md-12">
	                <div class="abt-title">
	                    <h2>ABOUT US</h2>
	                </div>
                	<div class="about-desc" style="text-align:justify !important;">
            			@if (isset($profil['about-us']))
							{!!$profil['about-us']->deskripsi!!}
						@else
							<h1>Data Not Avaliable</h1>
						@endif
                	</div>
                </div>
            </div>
        </div>
    </div>

@endsection
