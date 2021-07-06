<div class="col-md-2">
	<div class="thumbnail ">
  		<img class="card-img-top" src="{{ asset('images/file-ext/'.$ext.'.png') }}" alt="Card image cap" width="64">
  		<div class="caption">
    		<h4 class="card-title">{{ basename($file) }}</h4>
    		<p class="card-text">{!! $text or '' !!}</p>
    		<a href="?dwn={{ $file }}" class="btn btn-primary" target="_blank"><i class="fa fa-download" aria-hidden="true"></i>&nbsp;download</a>
  		</div>
	</div>
</div>