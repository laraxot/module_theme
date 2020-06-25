{{ Theme::add('theme::css/socialshare.css') }}
<div id="share">
	<a class="facebook" rel="nofollow" href="https://www.facebook.com/sharer.php?u={{ $row->url }}&amp;t={{ $row->title }}" title="Share to Facebook" onclick="window.open(this.href,'targetWindow','toolbars=0,location=0,status=0,menubar=0,scrollbars=1,resizable=1,width=640,height=320,left=200,top=200');return false;">
		<i class="fa fa-facebook"></i>
	</a>
	<a  class="twitter" rel="nofollow" href="https://twitter.com/share?text={{ $row->title }}&amp;url={{ $row->url }}&amp;via=wmsaver" title="Share to Twitter" onclick="window.open(this.href,'targetWindow','toolbars=0,location=0,status=0,menubar=0,scrollbars=1,resizable=1,width=640,height=320,left=200,top=200');return false;">
		<i class="fa fa-twitter"></i>
	</a>
	<a class="googleplus" rel="nofollow" href="https://plus.google.com/share?url={{ $row->url }}" title="Share to Google Plus" onclick="window.open(this.href,'targetWindow','toolbars=0,location=0,status=0,menubar=0,scrollbars=1,resizable=1,width=640,height=320,left=200,top=200');return false;">
		<i class="fa fa-google-plus"></i>
	</a>
	<a class="linkedin" rel="nofollow" href="https://www.linkedin.com/shareArticle?mini=true&amp;url={{ $row->url }}&amp;title={{ $row->title }}{{--  &amp;source=http://www.salvatore-russo.it/--}}" title="Share to LinkedIn" onclick="window.open(this.href,'targetWindow','toolbars=0,location=0,status=0,menubar=0,scrollbars=1,resizable=1,width=640,height=320,left=200,top=200');return false;">
		<i class="fa fa-linkedin"></i>
	</a>
	<a class="pinterest" rel="nofollow" href="https://pinterest.com/pin/create/bookmarklet/?media={{ $row->image_src }}&url={{ $row->url }}&is_video=false&description={{ $row->title }}" title="Share to LinkedIn" onclick="window.open(this.href,'targetWindow','toolbars=0,location=0,status=0,menubar=0,scrollbars=1,resizable=1,width=640,height=320,left=200,top=200');return false;">
		<i class="fa fa-pinterest-p"></i>
	</a>
</div>
