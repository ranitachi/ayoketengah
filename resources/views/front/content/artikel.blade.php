@extends('layouts.front',['kontak'=>$kontak])
@section('title')
Artikel
@endsection
@section('konten')
        <div class="rs-breadcrumbs breadcrumbs-overlay ungu-bg" style="padding:20px 0 20px !important;">
		    <div class="breadcrumbs-inner">
		        <div class="container">
		            <div class="row">
		                <div class="col-md-12 text-center">
		                    <h1 class="page-title" style="margin:10px 0 20px">Data Artikel</h1>
		                    <ul>
		                        <li>
		                            <a class="active" href="{{url('/')}}">Beranda</a>
		                        </li>
		                        <li>
		                            Artikel
		                        </li>
		                    </ul>
		                </div>
		            </div>
		        </div>
		    </div><!-- .breadcrumbs-inner end -->
		</div>
        <div class="rs-events-2 sec-spacer">
			<div class="container" id="data">
				@include('front.content.artikel-data')
            </div>
        </div>
@endsection
@section('footscript')
    <script type="text/javascript">
    $(window).on('hashchange', function() {
        if (window.location.hash) {
            var page = window.location.hash.replace('#', '');
            if (page == Number.NaN || page <= 0) {
                return false;
            }else{
                getData(page);
            }
        }
    });
    
    $(document).ready(function()
    {
        $(document).on('click', '.pagination a',function(event)
        {
            event.preventDefault();
  
            $('li').removeClass('active');
            $(this).parent('li').addClass('active');
  
            var myurl = $(this).attr('href');
            var page=$(this).attr('href').split('page=')[1];
  
            getData(page);
        });
  
    });
  
    function getData(page){
        $.ajax(
        {
            url: '?page=' + page,
            type: "get",
            datatype: "html"
        }).done(function(data){
            $("#data").empty().html(data);
            location.hash = page;
        }).fail(function(jqXHR, ajaxOptions, thrownError){
              alert('Data Artikel Tidak Tersedia');
        });
    }

    
</script>
@endsection