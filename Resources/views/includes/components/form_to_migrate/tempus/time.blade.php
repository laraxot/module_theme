<div class="form-group">
	<div class="input-group date" id="datetimepicker3" data-target-input="nearest">
		<input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker3"/>
		<div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker">
			<div class="input-group-text"><i class="fa fa-clock-o"></i></div>
		</div>
	</div>
</div>
{{ Theme::add("https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js") }}
{{ Theme::add("https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css") }}

@push('scripts')
<script type="text/javascript">
$(function () {
	$('#datetimepicker3').datetimepicker({
		format: 'LT'
	});
});
</script>
@endpush