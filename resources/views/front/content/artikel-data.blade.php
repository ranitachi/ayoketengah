<div class="row space-bt30">
    @foreach ($data as $item)
        <div class="col-lg-6 col-md-12">
            <div class="event-item">
                <div class="row rs-vertical-middle">
                    <div class="col-md-6">
                        <div class="event-img">
                            <img src="{{asset($item->cover)}}" alt="{{$item->judul}}">
                            <a class="image-link" href="javascript:detail({{$item->id}},'{{$item->judul_slug}}')" title="University Tour 2018">
                                <i class="fa fa-link"></i>
                            </a>
                        </div>                        		
                    </div>
                    <div class="col-md-6">
                        <div class="event-content">
                            <div class="event-meta">
                                <div class="event-date">
                                    <i class="fa fa-calendar"></i>
                                    <span>{{tglIndo($item->created_at)}}</span>
                                </div>
                                <div class="event-time">
                                    <i class="fa fa-tag"></i>
                                    <span>{{$item->kat->kategori}}</span>
                                </div>
                            </div>
                            <h3 class="event-title"><a href="javascript:detail({{$item->id}},'{{$item->judul_slug}}')">{{$item->judul}}</a></h3>
                            <div class="event-location">
                                <i class="fa fa-user"></i>
                                <span>{{$item->author_id==0 ? 'Admnistrator' : ($item->author->nama)}}</span>
                                &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-eye"></i>
                                <span>{{$item->views}}</span>
                                
                            </div>
                            
                            <div class="event-desc">
                                <p>
                                    {{potongtext($item->deskripsi,10)}} ...
                                </p>
                            </div>
                            <div class="event-btn">
                                <a href="javascript:detail({{$item->id}},'{{$item->judul_slug}}')">Selengkapnya</a>
                            </div>
                        </div>                    		
                    </div>
                </div>                    		
            </div>
        </div>
    @endforeach
</div>
<nav aria-label="Page navigation example" class="mt-50">
	{!! $data->render() !!}
</nav>