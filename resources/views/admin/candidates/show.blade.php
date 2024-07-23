$(document).ready(function() {
    // Function to populate modal with candidate data when edit button is clicked
    $(document).on('click', '.edit-btn', function() {
        var candidateId = $(this).data('candidate-id');
        var candidateName = $(this).data('candidate-name');
        var candidateEmail = $(this).data('candidate-email');
        var candidateRole = $(this).data('candidate-role');

        // Update modal fields with new data
        $('#editModal').find('.modal-title').text('Edit Mahasiswa');
        $('#editModal').find('#editId').val(candidateId);
        $('#editModal').find('#editName').val(candidateName);
        $('#editModal').find('#editEmail').val(candidateEmail);
        $('#editModal').find('#editRole').val(candidateRole);

        $('#editModal').modal('show');
    });

    // Ensure the modal content is cleared when the modal is hidden
    $('#editModal').on('hidden.bs.modal', function() {
        $(this).find('form')[0].reset(); // Reset form fields
    });

    // Handle form submission
    $('#editForm').submit(function(e) {
        e.preventDefault();

        var formData = $(this).serialize();
        var candidateId = $('#editId').val();

        $.ajax({
            url: $(this).attr('action').replace('__candidateId__', candidateId),
            method: 'POST',
            data: formData,
            success: function(response) {
                console.log('Form submission successful');
                console.log('Response:', response);
                $('#editModal').modal('hide');

                // Update the corresponding row in the table with the updated data
                $('#candidate_row_' + candidateId).find('.candidate-name').text($('#editName').val());
                $('#candidate_row_' + candidateId).find('.candidate-email').text($('#editEmail').val());
                $('#candidate_row_' + candidateId).find('.candidate-role').text($('#editRole').val());

                // Re-populate modal with updated data
                $('.edit-btn[data-candidate-id="' + candidateId + '"]').data('candidate-name', $('#editName').val());
                $('.edit-btn[data-candidate-id="' + candidateId + '"]').data('candidate-email', $('#editEmail').val());
                $('.edit-btn[data-candidate-id="' + candidateId + '"]').data('candidate-role', $('#editRole').val());
            },
            error: function(error) {
                console.error('Form submission error:', error);
                console.log('Error Response:', error.responseJSON);
                var errors = error.responseJSON.errors;
                var errorMessage = '';
                $.each(errors, function(key, value) {
                    errorMessage += value[0] + '<br>';
                });
                $('#formErrors').html('<div class="alert alert-danger">'+ errorMessage +'</div>');
            }
        });
    });
});
