<div>
    <button type="button" class="btn btn-success" wire:click="goPrev()" >prev</button>
    <button type="button" class="btn btn-success" wire:click="goNext()" >next</button>
    
    [{{ $i }}/{{ $n }}]
     <img src="data:image/png;base64, iVBORw0KGgoAAAANSUhEUgAAAAUA
    AAAFCAYAAACNbyblAAAAHElEQVQI12P4//8/w38GIAXDIBKE0DHxgljNBAAO
        9TXL0Y4OHwAAAABJRU5ErkJggg==" alt="Red dot" />
    {{--  
    <img src="data:image/png;base64,{!! base64_encode($this->img_src) !!}" />
    
        --}}
    
    <img src="{!! $this->img_src !!}" />
    
    
    
</div>
{{--  


    https://cwestblog.com/2017/05/03/javascript-snippet-get-video-frame-as-an-image/


// Create a new Capture object for the video file
var capture = createCapture("path/to/video.mp4");

// Set the Capture object to display the video data
capture.size(320, 240);
capture.hide();

function draw() {
  // Get the current frame of the video
  var frame = capture.get();

  // Display the frame on the canvas
  image(frame, 0, 0);
}

--}}