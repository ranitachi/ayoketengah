@extends('layouts.backend')
@section('title')
    Data {{$kat}}
@endsection
@section('header')
    <div class="page-header page-header-default">
		<div class="page-header-content">
			<div class="page-title">
				<h4><i class="icon-newspaper position-left"></i> <span class="text-semibold">Data</span> - {{$kat}}</h4>
            </div>
            <div class="heading-elements">
				<a href="{{url('tentang-form/'.$kat_slug)}}" class="btn btn-sm ungu-bg text-white"><i class="icon-googleplus5"></i> &nbsp;{{$data ? 'Edit' :'Tambah'}} {{$kat}}</a>
			</div>
		</div>
		
	</div>
@endsection
@section('konten')
    <!-- Dashboard content -->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-flat">
                    <div class="panel-heading">
							<h5 class="panel-title">Data {{$kat}}</h5>
							<div class="heading-elements">
								
					    	</div>
						</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                @if (Session::has('pesan'))
                                    <div class="alert alert-success">
                                        <h4><i class="icon-checkmark"></i>&nbsp;{{Session::get('pesan')}}</h4>
                                    </div>
                                @endif
                                @if (Session::has('error'))
                                    <div class="alert alert-danger">
                                        <h4><i class="icon-blocked"></i>&nbsp;{{Session::get('error')}}</h4>
                                    </div>
                                @endif
                                @if ($data)
                                    {!!$data->deskripsi!!}
                                @else
                                    <div class="text-center">
                                        <h3>Data {{$kat}} Masih Kosong</h3>
                                        <br>
                                        <a href="{{url('tentang-form/'.$kat_slug)}}" class="btn btn-sm ungu-bg text-white"><i class="icon-googleplus5"></i> &nbsp;Tambah {{$kat}}</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    
                    </div>
                </div>
		    </div>
		</div>
	<!-- /dashboard content -->
@endsection
@section('script')
    <script type="text/javascript" src="{{asset('back/assets/js/pages/datatables_data_sources.js')}}"></script>
    <script>
         
        setTimeout(function(){
            $('.alert').fadeOut('');
        },3000);

        
        function hapus(id)
        {
            $('#modal_theme_primary').modal('show');
            $('#okhapus').one('click',function(){
                location.href=url+'/admin-sub-kategori-hapus/'+id
            });
        }
    </script>

@endsection
@section('modal')
    <div id="modal_theme_primary" class="modal fade in">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-primary">
					<button type="button" class="close" data-dismiss="modal">×</button>
					<h6 class="modal-title">Informasi Hapus Data</h6>
				</div>
				<div class="modal-body">
					<h6 class="text-semibold">Apakah Anda Yakin ingin menghapus Data {{$kat}} ini ?</h6>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-link legitRipple" data-dismiss="modal">Close</button>
					<button type="button" id="okhapus" class="btn btn-primary legitRipple">Ya, Saya Yakin</button>
				</div>
			</div>
		</div>
	</div>
@endsection