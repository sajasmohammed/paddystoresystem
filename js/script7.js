
<script>
$(document).ready(function(){

 $('#send').click(function(){
  $('#pdfModal').modal('show');
  $('#pdf_form')[0].reset();
  $('.modal-title').text("Send Invitation");
  $('#image_id').val('');
  $('#action').val('insert');
  $('#insert').val("Insert");
 });
});
</script>
