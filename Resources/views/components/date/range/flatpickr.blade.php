<div class="datepicker">
  <div>
    <input type="text" id="startDate" placeholder="Choose start and end date" class="startDate" required value="" />
  </div>
  <div>
    <input type="text" id="endDate" class="endDate" required>
  </div>
</div>


@push('custom_css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush

@push('custom_js')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr('#startDate', {
            enableTime: true,
            allowInput: true,
            dateFormat: "m/d/Y h:iK",
            "plugins": [new rangePlugin({ input: "#endDate"})]
        });
    </script>
@endpush

