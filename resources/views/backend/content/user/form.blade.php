@extends('layouts.backend')
@section('title')
    Data User
@endsection
@section('header')
    <div class="page-header page-header-default">
		<div class="page-header-content">
			<div class="page-title">
                <h4><i class="icon-newspaper position-left"></i> <span class="text-semibold">Data User</span> - Form {{($id==-1 ? 'Baru' : 'Edit')}}</h4>
            </div>
            <div class="heading-elements">
				<a href="{{route('admin-user.index')}}" class="btn btn-sm ungu-bg text-white"><i class="icon-arrow-left12"></i> &nbsp;Kembali ke Data User</a>
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
                
                <form action="{{route('admin-user.proses',$id)}}" method="POST" class="form-horizontal" id="form-user">
                    @csrf
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">{{$id==-1 ? 'Tambah' : 'Edit'}} Data User</h5>
							<div class="heading-elements">
								
					    	</div>
						</div>
						<div class="panel-body">
							<div class="form-group">
								<label class="col-lg-2 control-label">Nama User :</label>
								<div class="col-lg-9">
                                    <input type="text" name="name" id="name" class="form-control" placeholder=" Nama User" value="{{$id!=-1 ? $user->name : ''}}">
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-lg-2 control-label">Email :</label>
								<div class="col-lg-9">
                                    <input type="text" name="email" id="email" class="form-control" placeholder="Email User" value="{{$id!=-1 ? $user->email : ''}}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Password :</label>
								<div class="col-lg-9">
                                    <input type="text" name="password" id="password" class="form-control" placeholder="Password User"> <small><i>Kosongkan jika tidak ganti password</i></small>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Telp/HP :</label>
								<div class="col-lg-9">
                                    <input type="text" name="telp" id="telp" class="form-control" placeholder="Telp/HP User" value="{{$id!=-1 ? $user->telp : ''}}">
								</div>
							</div>
                            <div class="form-group">
								<label class="col-lg-2 control-label">Status User:</label>
								<div class="col-lg-3">
									<select class="select" name="flag" id="flag">
										<option value="">- Pilih Status -</option>
										<option value="1" {{ $id!=-1 ? ($user->flag==1 ? 'selected="selected"' : '') : ''}}>Aktif</option>
										<option value="0" {{ $id!=-1 ? ($user->flag==0 ? 'selected="selected"' : '') : ''}}>Tidak Aktif</option>
									</select>
								</div>
							</div>
                            <div class="form-group">
								<label class="col-lg-2 control-label">Level User:</label>
								<div class="col-lg-3">
									<select class="select" name="level" id="level">
										<option value="">- Pilih Level -</option>
										<option value="0" {{ $id!=-1 ? ($user->level==0 ? 'selected="selected"' : '') : ''}}>Super Admin</option>
										<option value="1" {{ $id!=-1 ? ($user->level==1 ? 'selected="selected"' : '') : ''}}>Operator</option>
										<option value="2" {{ $id!=-1 ? ($user->level==2 ? 'selected="selected"' : '') : ''}}>User Umum</option>
										<option value="3" {{ $id!=-1 ? ($user->level==3 ? 'selected="selected"' : '') : ''}}>Team</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Foto User:</label>
								<div class="col-lg-9">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> Choose
                                        </a>
                                    </span>
                                        <input id="thumbnail" class="form-control" type="text" name="foto" value="{{$id!=-1 ? $user->foto : ''}}">
                                    </div>
                                    @if ($id!=-1)
                                        <img id="holder" style="margin-top:15px;max-height:100px;" src="{{asset($user->foto)}}">
                                    @else
                                        <img id="holder" style="margin-top:15px;max-height:100px;">
                                    @endif
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-12 control-label">Biografi:</label>
								<div class="col-lg-12">
									<textarea rows="5" cols="5" name="biografi" id="biografi" class="biografi form-control" placeholder="Enter your message here">{{$id!=-1 ? $user->biografi : ''}}
                                    </textarea>
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
    <script src="{{asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
    
    <script>
        $('#simpan').on('click',function(){
            var nama=$('#nama').val();
            var status=$('#flag').val();
            var gambar=$('#thumbnail').val();
            var email=$('#email').val();
            var telp=$('#telp').val();
            var level=$('#level').val();
            
            if(nama=='')
            {
                notif('Anda Belum Memasukan Nama User');
            }
            else if(email=='')
            {
                notif('Anda Belum Memasukan Email User');
            }
            else if(telp=='')
            {
                notif('Anda Belum Memasukan Telepon User');
            }
            else if(status=='')
            {
                notif('Anda Belum Memilih Status User');
            }
            else if(level=='')
            {
                notif('Anda Belum Memilih Level User');
            }
            else
                $('#form-user').submit()
        });
        var domain = "{{url('/laravel-filemanager')}}";
        var options = {
            filebrowserImageBrowseUrl: domain+'?type=Images',
            filebrowserImageUploadUrl: domain+'/upload?type=Images&_token=',
            filebrowserBrowseUrl: domain+'?type=Files',
            filebrowserUploadUrl: domain+'/upload?type=Files&_token=',
            height : 250
        };
        CKEDITOR.replace( 'biografi' ,options);
        $('#lfm').filemanager('image', {prefix: domain});

        setTimeout(function(){
            $('.alert').hide('fadeOut');
        },3000);
    </script>
    
@endsection