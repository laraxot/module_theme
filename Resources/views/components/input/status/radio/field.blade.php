@foreach($statuses as $status)
    <input type="radio" class="btn-check" name="options" id="option1" autocomplete="off" >
    <label class="btn btn-warning" for="option1">{{ $status['label'] }}</label>
@endforeach
<input type="radio" class="btn-check" name="options" id="option1" autocomplete="off" checked>
<label class="btn btn-warning" for="option1">X</label>

<input type="radio" class="btn-check" name="options" id="option2" autocomplete="off">
<label class="btn btn-success" for="option2"></label>

<input type="radio" class="btn-check" name="options" id="option3" autocomplete="off">
<label class="btn btn-danger" for="option3"></label>