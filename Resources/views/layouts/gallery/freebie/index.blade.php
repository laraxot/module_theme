{{--
https://tutorialzine.com/2018/03/3-amazing-bootstrap-4-gallery-templates
--}}
{{ Theme::add("https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css") }}
{{ Theme::add("https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js") }}
{{ Theme::add("pub_theme::layouts.gallery.freebie/css/cards-gallery.css") }}
@push('scripts')
<script>
    baguetteBox.run('.cards-gallery', { animation: 'slideIn'});
</script>
@endpush

<section class="gallery-block cards-gallery">
    <div class="container">
    	{{--
        <div class="heading">
          <h2>Cards Gallery</h2>
        </div>
        --}}
        <div class="row">
        	@foreach($rows as $row)
        		@include('pub_theme::layouts.partials.item.card_photo')
            @endforeach
        </div>
    </div>
</section>