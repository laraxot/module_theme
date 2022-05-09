<link rel="import" href="/public_html/bc/vaadin-date-picker/vaadin-date-picker.html">
<vaadin-date-picker name="date" 
	required 
	error-message="This field is required" 
	label="Pick a date" 
	placeholder="Pick a date" 
	value="1980-08-14"></vaadin-date-picker>
{{-- 
min="2017-06-01" max="2017-06-30" initial-position="2017-06-01"
 --}}
@push('scripts')
<script>
window.addEventListener('WebComponentsReady', function() {
  // Async call needed here for IE11 compatibility.
  Polymer.Base.async(function() {
    // Set up the parser library for Finnish locale
    Sugar.Date.setLocale('fi');

    var datepicker = document.querySelector('vaadin-date-picker#finnish');
    datepicker.i18n = {
      week: 'viikko',
      calendar: 'kalenteri',
      clear: 'tyhjennä',
      today: 'tänään',
      cancel: 'peruuta',
      firstDayOfWeek: 1,
      monthNames:
       'tammikuu_helmikuu_maaliskuu_huhtikuu_toukokuu_kesäkuu_heinäkuu_elokuu_syyskuu_lokakuu_marraskuu_joulukuu'.split('_'),
      weekdays: 'sunnuntai_maanantai_tiistai_keskiviikko_torstai_perjantai_lauantai'.split('_'),
      weekdaysShort: 'su_ma_ti_ke_to_pe_la'.split('_'),
      formatDate: function(date) {
        // Sugar Date expects a native date. The `date` is in format `{ day: ..., month: ..., year: ... }`
        return Sugar.Date.format(Sugar.Date.create(date), '{short}');
      },
      formatTitle: function(monthName, fullYear) {
        return monthName + ' ' + fullYear;
      },
      parseDate: function(dateString) {
        var matches = datepicker.i18n.monthNames.filter(function(monthName) {
          return monthName.toLowerCase().startsWith(dateString.trim().toLowerCase());
        });
        dateString = matches.length === 1 ? matches[0] : dateString;
        // Parse the date
        const date = Sugar.Date.create(dateString);
        return {
          day: date.getDate(),
          month: date.getMonth(),
          year: date.getFullYear()
        };
      }
    };
  });
});
</script>
@endpush