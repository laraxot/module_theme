{{-- meglio usare card/video/iframe.blade.php (?) --}}
<div class="card">
    <div class="card-image">
        <div class="embed-responsive embed-responsive-16by9">
            <iframe width="560" height="315" src="{{ $attrs['scr'] }}" frameborder="0" allowfullscreen></iframe>
        </div>
    </div><!-- card image -->
    <div class="card-content">
        <span class="card-title">Will my credits transfer?</span>
    </div><!-- card content -->
</div>
