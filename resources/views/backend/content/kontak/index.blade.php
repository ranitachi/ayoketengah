@extends('layouts.backend')
@section('title')
    Data Kontak
@endsection
@section('header')
    <div class="page-header page-header-default">
		<div class="page-header-content">
			<div class="page-title">
				<h4><i class="icon-newspaper position-left"></i> <span class="text-semibold">Data</span> - Kontak</h4>
            </div>
            <div class="heading-elements">
				<a href="{{route('admin-kontak',-1)}}" class="btn btn-sm ungu-bg text-white"><i class="icon-googleplus5"></i> &nbsp;{{$data ? 'Edit' :'Tambah'}} Kontak</a>
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
							<h5 class="panel-title">Data Kontak</h5>
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
                                @if ($data->count()!=0)
                                    <form action="{{route('admin-kontak.proses')}}" method="POST" class="form-horizontal" id="form-galeri">
                                        @csrf
                                       
                                                @foreach ($data as $item)                                   
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label text-right">{{$item->nama}} :</label>
                                                        <div class="col-lg-6">
                                                            <input type="hidden" name="nama[{{$item->id}}]" value="{{$item->nama}}">
                                                            <input type="text" name="value[{{$item->id}}]" id="value" class="form-control" placeholder="{{$item->nama}}" value="{{$item->value}}">
                                                        </div>
                                                    </div>    
                                                @endforeach                                            
                                                
                                                <div class="text-right">
                                                    <button type="submit" id="simpan" class="btn btn-primary">Simpan <i class="icon-floppy-disk position-right"></i></button>
                                                </div>
                                            
                                    </form>
                                @else
                                    <div class="text-center">
                                        <h3>Data Kontak Masih Kosong</h3>
                                        <br>
                                        <a href="{{route('admin-kontak')}}" class="btn btn-sm ungu-bg text-white"><i class="icon-googleplus5"></i> &nbsp;Tambah Kontak</a>
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
                location.href=url+'/admin-kontak-hapus/'+id
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
					<h6 class="text-semibold">Apakah Anda Yakin ingin menghapus Data Kontak ini ?</h6>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-link legitRipple" data-dismiss="modal">Close</button>
					<button type="button" id="okhapus" class="btn btn-primary legitRipple">Ya, Saya Yakin</button>
				</div>
			</div>
		</div>
	</div>
@endsection