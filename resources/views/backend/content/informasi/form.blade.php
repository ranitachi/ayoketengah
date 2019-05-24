@extends('layouts.backend')
@section('title')
    Form Informasi
@endsection
@section('header')
    <div class="page-header page-header-default">
		<div class="page-header-content">
			<div class="page-title">
				<h4><i class="icon-newspaper position-left"></i> <span class="text-semibold">Data Informasi </span> - Form {{($id==-1 ? 'Baru' : 'Edit')}}</h4>
            </div>
            <div class="heading-elements">
				<a href="{{route('admin-informasi')}}" class="btn btn-sm ungu-bg text-white"><i class="icon-arrow-left12"></i> &nbsp;Kembali Ke Data Informasi</a>
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
                
                <form action="{{route('admin-informasi.proses',$id)}}" method="POST" class="form-horizontal" id="form-informasi">
                    @csrf
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">{{$id==-1 ? 'Tambah' : 'Edit'}} Data Informasi</h5>
							<div class="heading-elements">
								
					    	</div>
						</div>
						<div class="panel-body">
							<div class="form-group">
								<label class="col-lg-2 control-label">Nomor Dokumen :</label>
								<div class="col-lg-9">
                                    <input type="text" name="nomor_dokumen" id="nomor_dokumen" class="form-control" placeholder="Nomor Dokumen value="{{$id!=-1 ? $inf->nomor_dokumen : ''}}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Judul :</label>
								<div class="col-lg-9">
                                    <input type="text" name="nama_file" id="nama_file" class="form-control" placeholder="Judul Informasi" value="{{$id!=-1 ? $inf->nama_file : ''}}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Tahun:</label>
								<div class="col-lg-2" id="">
									<select class="select" name="tahun" id="tahun">
                                        <option value="">- Pilih Tahun -</option>
                                        @for ($i = date('Y'); $i >=(date('Y')-5); $i--)
                                            @if ($id!=-1)
                                                
                                                @if ($i==$inf->tahun)
                                                    <option selected="selected" value="{{$i}}">{{$i}}</option>
                                                @else
                                                    <option value="{{$i}}">{{$i}}</option>
                                                @endif
                                            @else
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endif
                                        @endfor
									</select>
								</div>
                            </div>
                            <div class="form-group">
								<label class="col-lg-2 control-label">Kategori:</label>
								<div class="col-lg-4">
									<select class="select" name="kategori" id="kategori" onchange="pilihsubkat(this.value)">
										<option value="">- Pilih Kategori -</option>
                                        @foreach ($kat as $item)
                                            @if ($id!=-1)
                                                @if ($inf->kategori_id==$item->id)
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
								<label class="col-lg-2 control-label">Sub Kategori:</label>
								<div class="col-lg-4" id="subkat">
									<select class="select" name="jenis" id="jenis">
                                        <option value="">- Pilih Sub Kategori -</option>
                                        @if ($id!=-1)
                                            @foreach($subkat as $k=>$v)
                                                @if ($v->id==$inf->jenis_id)
                                                    <option value="{{$v->id}}" selected="selected">{{$v->kategori_sub}}</option>
                                                @else
                                                    <option value="{{$v->id}}">{{$v->kategori_sub}}</option>
                                                @endif
                                            @endforeach
                                        @endif
									</select>
								</div>
                            </div>
                            <div class="form-group">
								<label class="col-lg-2 control-label">Dinas:</label>
								<div class="col-lg-4">
									<select class="select" name="dinas" id="dinas">
										<option value="">- Pilih Dinas -</option>
                                        @foreach ($dinas as $item)
                                            @if ($id!=-1)
                                                @if ($inf->dinas_id==$item->id)
                                                    <option value="{{$inf->dinas_id}}" selected="selected">{!!$item->nama_dinas!!}</option>
                                                @else
                                                    <option value="{{$item->id}}">{!!$item->nama_dinas!!}</option>
                                                @endif
                                            @else
                                                <option value="{{$item->id}}">{!!$item->nama_dinas!!}</option>
                                            @endif
                                        @endforeach
									</select>
								</div>
                            </div>
                            <div class="form-group">
								<label class="col-lg-2 control-label">Status Informasi:</label>
								<div class="col-lg-3">
									<select class="select" name="status" id="status">
										<option value="">- Pilih Status -</option>
										<option value="0" {{ $id!=-1 ? ($inf->status==0 ? 'selected="selected"' : '') : ''}}>Draft</option>
										<option value="1" {{ $id!=-1 ? ($inf->status==1 ? 'selected="selected"' : '') : ''}}>Publish</option>
										<option value="2" {{ $id!=-1 ? ($inf->status==2 ? 'selected="selected"' : '') : ''}}>Tidak Publish</option>
									</select>
								</div>
							</div>
                            <div class="form-group">
								<label class="col-lg-2 control-label">File Dokumen (*Only Pdf):</label>
								<div class="col-lg-9">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <a id="lfm" data-input="thumbnail" class="btn btn-primary">
                                            <i class="fa fa-picture-o"></i> Choose
                                            </a>
                                        </span>
                                        <input id="thumbnail" readonly class="form-control" type="text" name="filepath" value="{{$id!=-1 ? $inf->filepath : ''}}">
                                    </div>
                                    
								</div>
                            </div>
                            
                            <div class="form-group">
								<label class="col-lg-2 control-label">Keterangan:</label>
								<div class="col-lg-9">
									<textarea rows="5" cols="5" name="keterangan" id="keterangan" class="keterangan form-control" placeholder="Enter your message here">{{$id!=-1 ? $inf->keterangan : ''}}
                                    </textarea>
								</div>
                            </div>
                            <div class="text-right">
								<button type="button" id="simpan" class="btn btn-primary">Simpan <i class="icon-floppy-disk position-right"></i></button>
							</div>
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
    <script src="{{asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('vendor/laravel-filemanager/js/lfm.js')}}"></script>
    <script>
        
        $('#simpan').on('click',function(){
            var nama_file = $('#nama_file').val();
            var nomor_dokumen = $('#nomor_dokumen').val();
            var tahun = $('#tahun').val();
            var kategori = $('#kategori').val();
            var jenis = $('#jenis').val();
            var dinas = $('#dinas').val();
            var thumbnail = $('#thumbnail').val();
            var keterangan=CKEDITOR.instances['keterangan'].getData();
            if(nomor_dokumen=='')
            {
                notif('Anda Belum Nomor Dokumen');
            }
            else if(nama_file=='')
            {
                notif('Anda Belum Nama Judul Informasi');
            }
            else if(tahun=='')
            {
                notif('Anda Belum Memilih Tahun Informasi');
            }
            else if(kategori=='')
            {
                notif('Anda Belum Memilih Kategori Informasi');
            }
            else if(jenis=='')
            {
                notif('Anda Belum Memilih Jenis Informasi');
            }
            else if(dinas=='')
            {
                notif('Anda Belum Memilih Dinas');
            }
            else if(thumbnail=='')
            {
                notif('Anda Belum Memasukan File');
            }
            else if(keterangan=='')
            {
                notif('Anda Belum Memasukan Keterangan');
            }
            else
                $('#form-informasi').submit()
        });
        var domain = "{{url('/laravel-filemanager')}}";
         
        var options = {
            filebrowserImageBrowseUrl: domain+'?type=Images',
            filebrowserImageUploadUrl: domain+'/upload?type=Images&_token=',
            filebrowserBrowseUrl: domain+'?type=Files',
            filebrowserUploadUrl: domain+'/upload?type=Files&_token='
        };
        CKEDITOR.replace( 'keterangan' ,options);
        $('#lfm').filemanager('pdf', {prefix: domain});

        function pilihsubkat(idkat)
        {
            $('#subkat').load('{{url("/")}}/get-subkat/'+idkat,function(){
                $('.select').select2();
            });
        }
    </script>
@endsection
