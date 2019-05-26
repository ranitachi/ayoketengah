    @foreach ($data as $item)
        
        <div class="col-lg-3 col-md-6">
        	<div class="gallery-item">
        	    <img src="images/gallery/1.jpg" alt="Gallery Image">
        	    <div class="gallery-desc">
        			<h3><a href="#">Photo Title Here</a></h3>
        			<p>There are many variations of Lorem Ipsum available</p>
        			<a class="image-popup" href="images/gallery/1.jpg" title="Photo Title Here">
        				<i class="fa fa-search"></i>
        			</a>
        	    </div>
        	</div>
        </div>
    @endforeach
<nav aria-label="Page navigation example">
        			{{-- <ul class="pagination justify-content-center">
        				<li class="page-item disabled"><a class="page-link fa fa-angle-left" href="#" tabindex="-1"></a></li>
        				<li class="page-item"><a class="page-link active" href="#">1</a></li>
        				<li class="page-item"><a class="page-link" href="#">2</a></li>
        				<li class="page-item"><a class="page-link dotted" href="#">...</a></li>
        				<li class="page-item"><a class="page-link" href="#">5</a></li>
        				<li class="page-item"><a class="page-link" href="#">6</a></li>
        				<li class="page-item"><a class="page-link fa fa-angle-right" href="#"></a></li>
        			</ul>
        	    </nav> --}}
	{!! $data->render() !!}
</nav>