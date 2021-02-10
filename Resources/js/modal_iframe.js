$(function() {
    $('#myModalIframe').on('show.bs.modal',
        function (event)  {
            var button = $(event.relatedTarget); // Button that triggered the modal
		    var title = button.data('title'); // Extract info from data-* attributes
            var url = button.data('href');
            var modal = $(this);
            modal.data('reload',0);
            modal.find('.modal-title').text(title);
            modal.find('iframe').attr('src',url);
        }
    );
});
/**
 * https://github.com/saribe/eModal
 */
