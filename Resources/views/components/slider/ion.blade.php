<div class="row">
    <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Ion Slider</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row margin">
                    <div class="col-sm-6">
                        <input id="range_1" type="text" name="range_1" value="">
                    </div>

                    <div class="col-sm-6">
                        <input id="range_2" type="text" name="range_2" value="1000;100000" data-type="double"
                            data-step="500" data-postfix=" &euro;" data-from="30000" data-to="90000"
                            data-hasgrid="true">
                    </div>
                </div>
                <div class="row margin">
                    <div class="col-sm-6">
                        <input id="range_5" type="text" name="range_5" value="">
                    </div>
                    <div class="col-sm-6">
                        <input id="range_6" type="text" name="range_6" value="">
                    </div>
                </div>
                <div class="row margin">
                    <div class="col-sm-12">
                        <input id="range_4" type="text" name="range_4" value="10000;100000">
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.js"
        integrity="sha512-n9xa1YNhliYadt8R0asevgxiC2AXktQTF9LkzNx/AWo0W8dK2y9nfuTen6u5w78B4lSRdI+w0An1Kl53jnozGQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(function() {

            /* ION SLIDER */
            $('#range_1').ionRangeSlider({
                min: 0,
                max: 5000,
                from: 1000,
                to: 4000,
                type: 'double',
                step: 1,
                prefix: '$',
                prettify: false,
                hasGrid: true
            })
            $('#range_2').ionRangeSlider()

            $('#range_5').ionRangeSlider({
                min: 0,
                max: 10,
                type: 'single',
                step: 0.1,
                postfix: ' mm',
                prettify: false,
                hasGrid: true
            })
            $('#range_6').ionRangeSlider({
                min: -50,
                max: 50,
                from: 0,
                type: 'single',
                step: 1,
                postfix: '°',
                prettify: false,
                hasGrid: true
            })

            $('#range_4').ionRangeSlider({
                type: 'single',
                step: 100,
                postfix: ' light years',
                from: 55000,
                hideMinMax: true,
                hideFromTo: false
            })
            $('#range_3').ionRangeSlider({
                type: 'double',
                postfix: ' miles',
                step: 10000,
                from: 25000000,
                to: 35000000,
                onChange: function(obj) {
                    var t = ''
                    for (var prop in obj) {
                        t += prop + ': ' + obj[prop] + '\r\n'
                    }
                    $('#result').html(t)
                },
                onLoad: function(obj) {
                    //
                }
            })
        })
    </script>
@endpush
@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.css"
        integrity="sha512-UzcnE2gVMx7OCuXHLNVyoElL8v2QGAOidIn6PIy0d8ciWuqMBsgpB4QfKcuj8RbHrljngft9T8remhtF992RlQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
