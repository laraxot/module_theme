$(
    function () {
        //$( ".date-picker-jqui" ).datepicker( $.datepicker.regional[ "it" ] );
        $(".date-picker-jqui").datepicker(
            {
                format: 'dd/mm/yy'
            }
        );
    }
);