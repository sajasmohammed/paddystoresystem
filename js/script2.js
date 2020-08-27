< script >
    $(document).ready(function() {

        $('#add').click(function() {
            $('#imageModal').modal('show');
            $('#image_form')[0].reset();
            $('.modal-title').text("Add Monthly ");
            $('#image_id').val('');
            $('#action').val('insert');
            $('#insert').val("Insert");
        });
    });

<
/script>