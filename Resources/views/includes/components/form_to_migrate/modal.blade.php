@push('styles')
<style type="text/css">
 /* full screen modal */
        .modal.modal-fullscreen {
  /* Maximize the main wrappers on the screen */
  /* Make the parent wrapper of the modal box a full-width block */
  /* Remove borders and effects on the content */
  /**
   * /!\ By using this feature, you force the header and footer to be placed
   * in an absolute position. You must handle by yourself the margin of the
   * content.
   */
}
.modal.modal-fullscreen .modal-dialog,
.modal.modal-fullscreen .modal-content {
  bottom: 0;
  left: 0;
  position: absolute;
  right: 0;
  top: 0;
}
.modal.modal-fullscreen .modal-dialog {
  margin: 0;
  width: 100%;
}
.modal.modal-fullscreen .modal-content {
  border: none;
  -moz-border-radius: 0;
  border-radius: 0;
  -webkit-box-shadow: inherit;
  -moz-box-shadow: inherit;
  -o-box-shadow: inherit;
  box-shadow: inherit;
}
.modal.modal-fullscreen.force-fullscreen {
  /* Remove the padding inside the body */
}
.modal.modal-fullscreen.force-fullscreen .modal-body {
  padding: 0;
}
.modal.modal-fullscreen.force-fullscreen .modal-header,
.modal.modal-fullscreen.force-fullscreen .modal-footer {
  left: 0;
  position: absolute;
  right: 0;
}
.modal.modal-fullscreen.force-fullscreen .modal-header {
  top: 0;
}
.modal.modal-fullscreen.force-fullscreen .modal-footer {
  bottom: 0;
}
</style>
@endpush


{{-- modal   --}}
<div class="modal fade modal-fullscreen force-fullscreen" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <p>One fine body…</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="btnSave" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


@push('scripts')
<script>

var $invoker;
var $myModal;

$("#myModal").on("show.bs.modal", function(e) {
    $invoker = $(e.relatedTarget);
    $myModal=$(this);
    $myModal.find(".modal-body").html('<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>');
      var link = $(e.relatedTarget);
    var $data={};
    var all=link.parents(".grid-stack-item-content").find('input, select, textarea').each(function() {
      $k=$(this).attr('name');//.slice(0,-2); // per togliere []
      $v=$(this).val();
      //alert($k+'   '+$v);
      $data[$k]=$v; 
    }); 


    //alert($data['_token']);

    var $method='post';
    //var $token=$data['_token'];
    $.ajax({
      type:$method,
      url: '../../component',
      //_method:$method,
      //_token:$token,
      //contentType: "application/json; charset=utf-8",
        //dataType: "json",
      data:$data,
      //data:{_token:$token,content:$data['content'],content_type:$data['content_type'],}, 
      
      success: function(data, status) {
                $myModal.find(".modal-body").html(data);  
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
              /*
              html='';
              for(i in XMLHttpRequest){
                html='<br/> '+i+'  =  '+ XMLHttpRequest[i];
              }
              alert(html);
              //alert('XMLHttpRequest' + XMLHttpRequest);
                alert("Status: " + textStatus); alert("Error: " + errorThrown); 
              */
            }       
    });
      



  });

$('#btnSave').click(function() {
    $myModal.find('input, select, textarea').each(function() {
        $k=$(this).attr('name');
        $v=$(this).val();
        alert($k+'  '+$v);
        //$data[$k]=$v;
        //alert($invoker.parent().parent().find('[name='+$k+']').val());
        $invoker.parent().parent().find('[name='+$k+']').val($v);     
    });
    


   $('#myModal').modal('hide');
});

    // Prevent bootstrap dialog from blocking focusin
$(document).on('focusin', function(e) {
    if ($(e.target).closest(".mce-window").length) {
        e.stopImmediatePropagation();
    }
});

    </script>
@endpush


{{ Theme::add('/theme/bc/tinymce/tinymce.js') }}