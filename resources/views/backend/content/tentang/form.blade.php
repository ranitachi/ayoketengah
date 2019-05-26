@extends('layouts.backend')
@section('title')
    Form {{$katg}}
@endsection
@section('header')
    <div class="page-header page-header-default">
		<div class="page-header-content">
			<div class="page-title">
                <h4><i class="icon-newspaper position-left"></i> <span class="text-semibold">Data {{$katg}}</span> - Form</h4>
            </div>
            <div class="heading-elements">
				<a href="{{url('tentang/'.$kat)}}" class="btn btn-sm ungu-bg text-white"><i class="icon-arrow-left12"></i> &nbsp;Kembali ke {{$katg}}</a>
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
                
                <form action="{{url('tentang-proses/'.$kat)}}" method="POST" class="form-horizontal" id="form-galeri">
                    @csrf
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Form {{$katg}}</h5>
							<div class="heading-elements">
								
					    	</div>
						</div>
						<div class="panel-body">
                            
							<div class="form-group">
								<label class="col-lg-2 control-label">Kategori :</label>
								<div class="col-lg-6">
                                    <input type="text" readonly name="kategori" id="kategori" class="form-control" placeholder="{{$katg}}" value="{{$id!=-1 ? $data->kategori : $katg}}">
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-lg-12 control-label">Keterangan:</label>
								<div class="col-lg-12">
									<textarea rows="5" cols="5" name="isi" id="isi" class="isi form-control" placeholder="Enter your message here">{{$id!=-1 ? $data->deskripsi : ''}}
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
    
    <script src="{{asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('vendor/laravel-filemanager/js/lfm.js')}}"></script>
    
    <script>
        $('#simpan').on('click',function(){
            var kategori=$('#kategori_id').val();
            var isi=CKEDITOR.instances['isi'].getData();
            
            if(kategori=='')
            {
                notif('Anda Belum Menentukan {{$katg}} Gambar {{$katg}}');
            }
            else if(isi=='')
            {
                notif('Anda Belum Memasukan Keterangan {{$katg}}');
            }
            else
                $('#form-galeri').submit()
        });
        var domain = "{{url('/laravel-filemanager')}}";
        var options = {
            filebrowserImageBrowseUrl: domain+'?type=Images',
            filebrowserImageUploadUrl: domain+'/upload?type=Images&_token=',
            filebrowserBrowseUrl: domain+'?type=Files',
            filebrowserUploadUrl: domain+'/upload?type=Files&_token=',
            height : 450
        };
        CKEDITOR.replace( 'isi' ,options);
        
        $('#lfm').filemanager('image', {prefix: domain});

        setTimeout(function(){
            $('.alert').hide('fadeOut');
        },3000);
    </script>
    
@endsection