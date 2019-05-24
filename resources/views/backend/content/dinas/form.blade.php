@extends('layouts.backend')
@section('title')
    Data Dinas
@endsection
@section('header')
    <div class="page-header page-header-default">
		<div class="page-header-content">
			<div class="page-title">
                <h4><i class="icon-newspaper position-left"></i> <span class="text-semibold">Data Dinas</span> - Form {{($id==-1 ? 'Baru' : 'Edit')}}</h4>
            </div>
            <div class="heading-elements">
				<a href="{{route('admin-dinas.index')}}" class="btn btn-sm ungu-bg text-white"><i class="icon-arrow-left12"></i> &nbsp;Kembali ke Data Dinas</a>
			</div>
		</div>
		
	</div>
@endsection
@section('konten')
    <!-- Dashboard content -->
		<div class="row">
			<div class="col-lg-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <form action="{{route('admin-dinas.proses',$id)}}" method="POST" class="form-horizontal" id="form-dinas">
                    @csrf
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">{{$id==-1 ? 'Tambah' : 'Edit'}} Data Dinas</h5>
							<div class="heading-elements">
								
					    	</div>
						</div>
						<div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-lg-4 control-label">Nama Dinas :</label>
                                        <div class="col-lg-7">
                                            <input type="text" name="nama_dinas" id="nama_dinas" class="form-control" placeholder=" Nama Dinas" value="{{$id!=-1 ? $dinas->nama_dinas : ''}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-4 control-label">Singkatan :</label>
                                        <div class="col-lg-7">
                                            <input type="text" name="singkatan" id="singkatan" class="form-control" placeholder="Singkatan" value="{{$id!=-1 ? $dinas->singkatan : ''}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-4 control-label">NIP :</label>
                                        <div class="col-lg-7">
                                            <input type="text" name="nip" id="nip" class="form-control" placeholder="NIP" value="{{$id!=-1 ? $dinas->nip : ''}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-4 control-label">Nama Pimpinan :</label>
                                        <div class="col-lg-7">
                                            <input type="text" name="nama_kepala" id="nama_kepala" class="form-control" placeholder="Nama Pimpinan" value="{{$id!=-1 ? $dinas->nama_kepala : ''}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-lg-4 control-label">Web :</label>
                                        <div class="col-lg-7">
                                            <input type="text" name="web" id="web" class="form-control" placeholder="http://" value="{{$id!=-1 ? $dinas->web : ''}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-4 control-label">Email :</label>
                                        <div class="col-lg-7">
                                            <input type="text" name="email" id="email" class="form-control" placeholder="email@email.com" value="{{$id!=-1 ? $dinas->email : ''}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-4 control-label">Telp/HP :</label>
                                        <div class="col-lg-7">
                                            <input type="text" name="telp" id="telp" class="form-control" placeholder="Telp/HP Dinas" value="{{$id!=-1 ? $dinas->telp : ''}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-4 control-label">Alamat :</label>
                                        <div class="col-lg-7">
                                            <textarea name="alamat" id="alamat" class="form-control" placeholder="alamat">{{$id!=-1 ? $dinas->alamat : ''}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
							
							<div class="text-right">
								<button type="button" id="simpan" class="btn btn-primary">Simpan <i class="icon-floppy-disk position-right"></i></button>
							</div>
						</div>
					</div>
				</form>
		    </div>
		</div>
	<!-- /dashboard content -->
@endsection
@section('script')
    <script type="text/javascript" src="{{asset('back/assets/js/plugins/forms/selects/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('back/assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('back/assets/js/pages/form_layouts.js')}}"></script>
    <script type="text/javascript" src="{{asset('back/assets/js/plugins/notifications/pnotify.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('back/assets/js/plugins/notifications/noty.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('back/assets/js/plugins/notifications/jgrowl.min.js')}}"></script>
    {{-- <script type="text/javascript" src="assets/js/pages/form_tags_input.js"></script> --}}
    
    <script src="{{asset('vendor/laravel-filemanager/js/lfm.js')}}"></script>
    
    <script>
        $('#simpan').on('click',function(){
            var nama_dinas=$('#nama_dinas').val();
            var nip=$('#nip').val();
            var nama_kepala=$('#nama_kepala').val();
           
            
            if(nama_dinas=='')
            {
                notif('Anda Belum Memasukan Nama Dinas');
            }
            else if(nip=='')
            {
                notif('Anda Belum Memasukan NIP Pimpinan');
            }
            else if(nama_kepala=='')
            {
                notif('Anda Belum Memasukan Nama Pimpinan');
            }
            else
                $('#form-dinas').submit()
        });
        var domain = "{{url('/laravel-filemanager')}}";
        
        $('#lfm').filemanager('image', {prefix: domain});

        setTimeout(function(){
            $('.alert').hide('fadeOut');
        },3000);
    </script>
    
@endsection