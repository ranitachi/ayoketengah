@extends('layouts.backend')
@section('title')
    Dashboard
@endsection
@section('header')
    <div class="page-header page-header-default">
		<div class="page-header-content">
			<div class="page-title">
				<h4><i class="icon-grid5 position-left"></i> <span class="text-semibold">Home</span> - Dashboard</h4>
			</div>
			<div class="heading-elements">
				&nbsp;
			</div>
		</div>
		
	</div>
@endsection
@section('konten')
    <!-- Dashboard content -->
					<div class="row">
						<div class="col-lg-12">

							<!-- Quick stats boxes -->
							<div class="row">
								<div class="col-lg-3">

									<!-- Members online -->
									<div class="panel bg-teal-400">
										<div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <i class="icon-newspaper" style="font-size:32pt;width:100%"></i>
                                                </div>
                                                <div class="col-md-9">
                                                    <h3 class="no-margin">3,450</h3>
                                                    Jumlah Berita
                                                </div>
                                            </div>
											<div class="text-muted text-size-small"></div>
										</div>

										<div class="container-fluid">
											<div id="members-online"></div>
										</div>
									</div>
									<!-- /members online -->

								</div>

								<div class="col-lg-3">

									<!-- Current server load -->
									<div class="panel bg-pink-400">
										<div class="panel-body">
											<div class="heading-elements">
												
											</div>

											<div class="row">
                                                <div class="col-md-3">
                                                    <i class="icon-grid3" style="font-size:32pt;width:100%"></i>
                                                </div>
                                                <div class="col-md-9">
                                                    <h3 class="no-margin">3,450</h3>
                                                    Jumlah Data Informasi
                                                </div>
                                            </div>

											<div class="text-muted text-size-small"></div>
										</div>

										<div id="server-load"></div>
									</div>
									<!-- /current server load -->

								</div>

								<div class="col-lg-3">

									<!-- Today's revenue -->
									<div class="panel bg-green-400">
										<div class="panel-body">
											<div class="heading-elements">
												<ul class="icons-list">
							                		{{-- <li><a data-action="reload"></a></li> --}}
							                	</ul>
						                	</div>

											<div class="row">
                                                <div class="col-md-3">
                                                    <i class="icon-grid5" style="font-size:32pt;width:100%"></i>
                                                </div>
                                                <div class="col-md-9">
                                                    <h3 class="no-margin">3,450</h3>
                                                    Jumlah Pengajuan
                                                </div>
                                            </div>

											<div class="text-muted text-size-small"></div>
										</div>

										<div id="today-revenue"></div>
									</div>
									<!-- /today's revenue -->

								</div>
								<div class="col-lg-3">

									<!-- Today's revenue -->
									<div class="panel bg-blue-400">
										<div class="panel-body">
											<div class="heading-elements">
												<ul class="icons-list">
							                		{{-- <li><a data-action="reload"></a></li> --}}
							                	</ul>
						                	</div>

											<div class="row">
                                                <div class="col-md-3">
                                                    <i class="icon-comments" style="font-size:32pt;width:100%"></i>
                                                </div>
                                                <div class="col-md-9">
                                                    <h3 class="no-margin">3,450</h3>
                                                    Jumlah Laporan
                                                </div>
                                            </div>

											<div class="text-muted text-size-small"></div>
										</div>

										<div id="today-revenue"></div>
									</div>
									<!-- /today's revenue -->

								</div>
							</div>
							<!-- /quick stats boxes -->


                            <!-- Support tickets -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-flat">
                                        <div class="panel-heading text-center">
                                            <h6 class="panel-title "><h1>Grafik</h1></h6>
                                            
                                        </div>
                                        <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="chart-container has-scroll">
                                                    <div class="chart has-fixed-height has-minimum-width" id="basic_pie"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
							
							<!-- /support tickets -->


						

						</div>

					</div>
					<!-- /dashboard content -->
@endsection
@section('script')
<script type="text/javascript" src="{{asset('back/assets/js/plugins/visualization/echarts/echarts.js')}}"></script>
<script type="text/javascript" src="{{asset('back/assets/js/charts/echarts/pies_donuts.js')}}"></script>

@endsection