@extends('layouts.backend')
@section('title')
    Data Slider
@endsection
@section('header')
    <div class="page-header page-header-default">
		<div class="page-header-content">
			<div class="page-title">
                <h4><i class="icon-newspaper position-left"></i> <span class="text-semibold">Data Slider</span> - Form {{($id==-1 ? 'Baru' : 'Edit')}}</h4>
            </div>
            <div class="heading-elements">
				<a href="{{route('admin-slider.index')}}" class="btn btn-sm ungu-bg text-white"><i class="icon-arrow-left12"></i> &nbsp;Kembali ke Data Slider</a>
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
                
                <form action="{{route('admin-slider.proses',$id)}}" method="POST" class="form-horizontal" id="form-slider">
                    @csrf
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">{{$id==-1 ? 'Tambah' : 'Edit'}} Data Slider</h5>
							<div class="heading-elements">
								
					    	</div>
						</div>
						<div class="panel-body">
							<div class="form-group">
								<label class="col-lg-2 control-label">Judul Slider :</label>
								<div class="col-lg-9">
                                    <input type="text" name="judul" id="judul" class="form-control" placeholder="Judul Slider" value="{{$id!=-1 ? $berita->judul : ''}}">
								</div>
							</div>
							
                            <div class="form-group">
								<label class="col-lg-2 control-label">Status Slider:</label>
								<div class="col-lg-3">
									<select class="select" name="status" id="status">
										<option value="">- Pilih Status -</option>
										<option value="0" {{ $id!=-1 ? ($berita->flag==0 ? 'selected="selected"' : '') : ''}}>Draft</option>
										<option value="1" {{ $id!=-1 ? ($berita->flag==1 ? 'selected="selected"' : '') : ''}}>Publish</option>
										<option value="2" {{ $id!=-1 ? ($berita->flag==2 ? 'selected="selected"' : '') : ''}}>Tidak Publish</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Gambar Slider:</label>
								<div class="col-lg-9">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> Choose
                                        </a>
                                    </span>
                                        <input id="thumbnail" class="form-control" type="text" name="gambar" value="{{$id!=-1 ? $berita->gambar : ''}}">
                                    </div>
                                    @if ($id!=-1)
                                        <img id="holder" style="margin-top:15px;max-height:100px;" src="{{asset($berita->gambar)}}">
                                    @else
                                        <img id="holder" style="margin-top:15px;max-height:100px;">
                                    @endif
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-12 control-label">Keterangan:</label>
								<div class="col-lg-12">
									<textarea rows="5" cols="5" name="keterangan" id="keterangan" class="keterangan form-control" placeholder="Enter your message here">{{$id!=-1 ? $berita->deskripsi : ''}}
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
    <script type="text/javascript" src="{{asset('back/assets/js/plugins/forms/tags/tagsinput.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('back/assets/js/plugins/forms/tags/tokenfield.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('back/assets/js/plugins/ui/prism.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('back/assets/js/plugins/forms/inputs/typeahead/typeahead.bundle.min.js')}}"></script>
    {{-- <script type="text/javascript" src="assets/js/pages/form_tags_input.js"></script> --}}
    
    <script src="{{asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('vendor/laravel-filemanager/js/lfm.js')}}"></script>
    
    <script>
        $('#kategori').tokenfield();
        $('#simpan').on('click',function(){
            var judul=$('#judul').val();
            var status=$('#status').val();
            var gambar=$('#thumbnail').val();
            var kategori=$('#kategori').val();
            var isi=CKEDITOR.instances['keterangan'].getData();
            
            if(judul=='')
            {
                notif('Anda Belum Memasukan Judul Slider');
            }
            else if(kategori=='')
            {
                notif('Anda Belum Menentukan Kategori Gambar Slider');
            }
            else if(gambar=='')
            {
                notif('Anda Belum Memilih Gambar Slider');
            }
            else if(status=='')
            {
                notif('Anda Belum Memilih Status Slider');
            }
            else if(keterangan=='')
            {
                notif('Anda Belum Memasukan Keterangan Slider');
            }
            else
                $('#form-slider').submit()
        });
        var domain = "{{url('/laravel-filemanager')}}";
        var options = {
            filebrowserImageBrowseUrl: domain+'?type=Images',
            filebrowserImageUploadUrl: domain+'/upload?type=Images&_token=',
            filebrowserBrowseUrl: domain+'?type=Files',
            filebrowserUploadUrl: domain+'/upload?type=Files&_token=',
            height : 400
        };
        CKEDITOR.replace( 'keterangan' ,options);
        
        $('#lfm').filemanager('image', {prefix: domain});

        setTimeout(function(){
            $('.alert').hide('fadeOut');
        },3000);
    </script>
    <style>
    .tokenfield .token-input 
    {
        width:100% !important;
        border-bottom:1px solid #ddd !important;
    }
    </style>
@endsection