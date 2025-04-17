<form class="upload-dragdrop" method="post" action="" enctype="multipart/form-data">
  <div class="upload-dragdrop-image">
    <img src="{{ asset('/dist/assets/upload-drag-drop-icon.svg') }}" alt="imagealt" aria-hidden="true">
    <div class="upload-dragdrop-loading">
      <div id="divProgress0" class="upload-progress"></div>
    </div>
    <div class="upload-dragdrop-success">
      <svg class="icon" aria-hidden="true">
          <use xlink:href="{{ asset('/dist/svg/sprite.svg')}}#it-check"></use>
        </svg>
    </div>
  </div>
  <div class="upload-dragdrop-text">
    <p class="upload-dragdrop-weight">
      <svg class="icon icon-xs" aria-hidden="true">
          <use xlink:href="{{ asset('/dist/svg/sprite.svg') }}#it-file"></use>
        </svg> PDF (3.7MB)
    </p>
    <h5>Trascina il file per caricarlo</h5>
    <p>oppure
        <input type="file" name="upload7" id="upload7" class="upload-dragdrop-input" />
        <label for="upload7">selezionalo dal dispositivo</label>
    </p>
  </div>
  <input value="Submit" type="submit" class="d-none" />
</form>


@endsection


@push('scripts')
<script>
    $(function() {
  var $form = $('.upload-dragdrop:not(.success)')
  var droppedFiles = false

  $form
    .on('drag dragstart dragend dragover dragenter dragleave drop', function(
      e
    ) {
      e.preventDefault()
      e.stopPropagation()
    })
    .on('dragover dragenter', function() {
      $(this).addClass('dragover')
    })
    .on('dragleave dragend drop', function() {
      $(this).removeClass('dragover')
    })
    .on('drop', function(e) {
      //change drag and drop state
      $(this).addClass('loading')
      //init upload circular loader
      $(this)
        .find('.upload-progress')
        .circularloader({
          backgroundColor: '#ffffff', //background colour of inner circle
          fontColor: '#000000', //font color of progress text
          fontSize: '40px', //font size of progress text
          radius: 130, //radius of circle
          progressBarBackground: 'transparent', //background colour of circular progress Bar
          progressBarColor: '#0073e6', //colour of circular progress bar
          progressBarWidth: 96, //progress bar width
          progressPercent: 0, //progress percentage out of 100, start with 0
        })
    })
})

</script>
@endpush
