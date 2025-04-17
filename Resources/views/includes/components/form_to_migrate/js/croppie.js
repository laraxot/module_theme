$.ajaxSetup(
    {
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }
);


var resize = $('#upload-demo').croppie(
    {
        enableExif: true,
        enableOrientation: true,    
        viewport: { // Default { width: 100, height: 100, type: 'square' } 
            width: 200,
            height: 200,
            type: 'circle' //square
        },
        boundary: {
            width: 300,
            height: 300
        }
    }
);


$('#image').on(
    'change', function () { 
        var reader = new FileReader();
        reader.onload = function (e) {
            resize.croppie(
                'bind',{
                    url: e.target.result
                }
            ).then(
                function () {
                    console.log('jQuery bind complete');
                }
            );
        }
        reader.readAsDataURL(this.files[0]);
    }
);


$('.upload-image').on(
    'click', function (ev) {
        resize.croppie(
            'result', {
                type: 'canvas',
                size: 'viewport'
            }
        ).then(
            function (img) {
                $.ajax(
                    {
                        url: "{{route('croppie.upload-image')}}",
                        type: "POST",
                        data: {"image":img},
                        success: function (data) {
                            html = '<img src="' + img + '" />';
                            $("#preview-crop-image").html(html);
                        }
                    }
                );
            }
        );
    }
);
