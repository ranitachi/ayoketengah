@extends('layouts.backend')
@section('title')
    Data Informasi
@endsection
@section('header')
    <div class="page-header page-header-default">
		<div class="page-header-content">
			<div class="page-title">
				<h4><i class="icon-newspaper position-left"></i> <span class="text-semibold">Data</span> - Informasi</h4>
            </div>
            <div class="heading-elements">
				<a href="{{route('admin-informasi.form',-1)}}" class="btn btn-sm ungu-bg text-white"><i class="icon-googleplus5"></i> &nbsp;Tambah Data Informasi</a>
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
							<h5 class="panel-title">Data Informasi</h5>
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
                                @if ($informasi->count()!=0)
                                    <table class="table datatable-kategori table-bordered table-hovered table-striped">
                                        <thead>
                                            <tr class="ungu-bg text-white">
                                                <th>No</th>
                                                <th>Dinas</th>
                                                <th>Kategori</th>
                                                <th>Informasi</th>
                                                <th>Keterangan</th>
                                                <th>Status</th>
                                                <th>Views /  Download</th>
                                                
                                                <th>#</th>
                                            </tr>
                                        </thead>
                                    </table>
                                @else
                                    <div class="text-center">
                                        <h3>Data Informasi Masih Kosong</h3>
                                        <br>
                                        <a href="{{route('admin-informasi.form',-1)}}" class="btn btn-sm ungu-bg text-white"><i class="icon-googleplus5"></i> &nbsp;Tambah Informasi</a>
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
        loaddata();
         
        setTimeout(function(){
            $('.alert').fadeOut('');
        },3000);

        function loaddata()
        {
            var url_ajax=url+'/api/json-informasi';
            $('.datatable-kategori').dataTable({
            // ajax: url+'/back/assets/demo_data/tables/datatable_ajax.json',
                ajax: url_ajax,
                autoWidth: false,
                columnDefs: [{ 
                    orderable: false,
                    width: '100px',
                    targets: [ 5 ]
                }],
                dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                language: {
                    search: '<span>Filter:</span> _INPUT_',
                    lengthMenu: '<span>Show:</span> _MENU_',
                    paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
                },
                drawCallback: function () {
                    $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
                },
                preDrawCallback: function() {
                    $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
                }
            });
        }

        function hapus(id)
        {
            $('#modal_theme_primary').modal('show');
            $('#okhapus').one('click',function(){
                location.href=url+'/admin-informasi-hapus/'+id
            });
        }
        function lihatdok(id)
        {
            $('#pdf-embed').attr('src', "{{url('/')}}/admin-lihat/"+id);
            $('#view-document').modal('show');
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
					<h6 class="text-semibold">Apakah Anda Yakin ingin menghapus Data Informasi ini ?</h6>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-link legitRipple" data-dismiss="modal">Close</button>
					<button type="button" id="okhapus" class="btn btn-primary legitRipple">Ya, Saya Yakin</button>
				</div>
			</div>
		</div>
    </div>
    <div class="modal fade in" id="view-document">                        
        <div class="modal-dialog modal-primary modal-full" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
					<button type="button" class="close" data-dismiss="modal">×</button>
					<h6 class="modal-title">Tampilan Dokumen</h6>
				</div>
                <div class="modal-body">
                    <embed id="pdf-embed" type="application/pdf"  height="500px" width="100%">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>            
    </div>
@endsection