@extends('layouts.backend')
@section('title')
    Data Sub Kategori
@endsection
@section('header')
    <div class="page-header page-header-default">
		<div class="page-header-content">
			<div class="page-title">
                <h4><i class="icon-newspaper position-left"></i> <span class="text-semibold">Data Sub Kategori</span> - Form {{($id==-1 ? 'Baru' : 'Edit')}}</h4>
            </div>
            <div class="heading-elements">
				<a href="{{route('admin-sub-kategori.index')}}" class="btn btn-sm ungu-bg text-white"><i class="icon-arrow-left12"></i> &nbsp;Kembali ke Data Sub Kategori</a>
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
                
                <form action="{{route('admin-sub-kategori.proses',[$idkat,$id])}}" method="POST" class="form-horizontal" id="form-galeri">
                    @csrf
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">{{$id==-1 ? 'Tambah' : 'Edit'}} Data Sub Kategori</h5>
							<div class="heading-elements">
								
					    	</div>
						</div>
						<div class="panel-body">
                            <div class="form-group">
								<label class="col-lg-2 control-label">Kategori:</label>
								<div class="col-lg-3">
									<select class="select" name="kategori_id" id="kategori_id">
                                        <option value="">- Pilih Kategori -</option>
                                        @foreach ($kat as $item)
                                            @if ($idkat!=-1)
                                                @if ($idkat==$item->id)
                                                    <option value="{{$item->id}}" selected="selected">{{$item->kategori}}</option>
                                                @else
                                                    <option value="{{$item->id}}">{{$item->kategori}}</option>    
                                                @endif
                                            @else
                                                <option value="{{$item->id}}">{{$item->kategori}}</option>
                                            @endif
                                        @endforeach
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Sub Kategori :</label>
								<div class="col-lg-6">
                                    <input type="text" name="kategori" id="kategori" class="form-control" placeholder="Sub Kategori" value="{{$id!=-1 ? $kategori->kategori_sub : ''}}">
								</div>
							</div>
							
                            <div class="form-group">
								<label class="col-lg-2 control-label">Status Sub Kategori:</label>
								<div class="col-lg-3">
									<select class="select" name="status" id="status">
										<option value="">- Pilih Status -</option>
										<option value="0" {{ $id!=-1 ? ($kategori->status==0 ? 'selected="selected"' : '') : ''}}>Draft</option>
										<option value="1" {{ $id!=-1 ? ($kategori->status==1 ? 'selected="selected"' : '') : ''}}>Publish</option>
										<option value="2" {{ $id!=-1 ? ($kategori->status==2 ? 'selected="selected"' : '') : ''}}>Tidak Publish</option>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-lg-12 control-label">Keterangan:</label>
								<div class="col-lg-12">
									<textarea rows="5" cols="5" name="keterangan" id="keterangan" class="keterangan form-control" placeholder="Enter your message here">{{$id!=-1 ? $kategori->keterangan : ''}}
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
        $('#simpan').on('click',function(){
            var kategori_id=$('#kategori_id').val();
            var status=$('#status').val();
            var kategori=$('#kategori').val();
            var isi=CKEDITOR.instances['keterangan'].getData();
            
            if(kategori_id=='')
            {
                notif('Anda Belum Memilih Kategori');
            }
            else if(kategori=='')
            {
                notif('Anda Belum Menentukan Sub Kategori Gambar Sub Kategori');
            }
            else if(status=='')
            {
                notif('Anda Belum Memilih Status Sub Kategori');
            }
            else if(keterangan=='')
            {
                notif('Anda Belum Memasukan Keterangan Sub Kategori');
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
        };
        CKEDITOR.replace( 'keterangan' ,options);
        
        $('#lfm').filemanager('image', {prefix: domain});

        setTimeout(function(){
            $('.alert').hide('fadeOut');
        },3000);
    </script>
    
@endsection