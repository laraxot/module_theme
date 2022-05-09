$(
    function () {
        $(".flatdatetime").flatpickr(
            {
                locale: "it",  // locale for this instance only
                //mode: "range",
                altInput: true,
                altFormat: "d/m/Y H:i",
                enableTime: true,
                time_24hr: true,
                timeFormat: "H:i",
                dateFormat: "Y-m-d H:i",
                //allowInput: true,
            }
        );
    }
);