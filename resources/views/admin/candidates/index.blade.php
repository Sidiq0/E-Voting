@extends('layouts.adminlte')

@section('page-title', 'List Kandidat')
@section('breadcrumb', 'Candidates')

@section('content')
    <!-- Your custom content goes here -->
    <div class="card">
        <div class="card-header">
            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createCandidateModal">
                <i class="fas fa-plus-circle"></i> Create Candidate
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Vision</th>
                            <th>Mission</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1; // Initialize a counter for sequential IDs
                        @endphp
                        @foreach ($candidates as $candidate)
                            <tr>
                                <td>{{ $counter }}</td>
                                <td>{{ $candidate->name }}</td>
                                <td>{{ $candidate->vision }}</td>
                                <td>{{ $candidate->mission }}</td>
                                <td>
                                    @if($candidate->image_path)
                                        <img src="{{ asset('storage/' . $candidate->image_path) }}" alt="{{ $candidate->name }}" width="100">
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center">
                                        <a href="#" class="btn btn-info btn-sm mr-2" data-toggle="modal" data-target="#candidateDetailsModal"
                                        data-candidate-name="{{ $candidate->name }}"
                                        data-candidate-vision="{{ $candidate->vision }}"
                                        data-candidate-mission="{{ $candidate->mission }}"
                                        data-candidate-image="{{ $candidate->image_path }}">
                                       Show
                                        </a>
                                    <button class="btn btn-primary btn-sm mr-2 edit-btn" data-toggle="modal" data-target="#editCandidateModal"
                                        data-candidate-id="{{ $candidate->id }}"
                                        data-candidate-name="{{ $candidate->name }}"
                                        data-candidate-vision="{{ $candidate->vision }}"
                                        data-candidate-mission="{{ $candidate->mission }}"
                                        data-candidate-image="{{ $candidate->image_path }}"
                                    >
                                        Edit
                                    </button>
                                    <form action="{{ route('admin.candidates.destroy', $candidate) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                    </div>
                                </td>
                            </tr>
                            @php
                                $counter++; // Increment counter for next iteration
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right"></ul>
        </div>
    </div>

    @include('admin.candidates.create')
    @include('admin.candidates.show')
    @include('admin.candidates.edit')

@endsection

@push('scripts')
        <!-- Additional scripts for handling modal -->
        <script>
            $(document).ready(function() {
                // Function to populate modal with candidate data when modal is shown
                $('#candidateDetailsModal').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget); // Button that triggered the modal
                    var candidateName = button.data('candidate-name');
                    var candidateVision = button.data('candidate-vision');
                    var candidateMission = button.data('candidate-mission');
                    var candidateImagePath = button.data('candidate-image');

                    // Update modal content with candidate data
                    $('#candidateName').text(candidateName);
                    $('#candidateVision').text(candidateVision);
                    $('#candidateMission').text(candidateMission);

                    // Display candidate image if available
                    if (candidateImagePath) {
                        var img = '<img src="{{ asset('storage') }}/' + candidateImagePath + '" alt="' + candidateName + '" width="100">';
                        $('#candidateImageContainer').html(img);
                    } else {
                        $('#candidateImageContainer').empty(); // Clear any existing image
                    }
                });
            });



            $(document).ready(function() {
    // Function to populate modal with candidate data when edit button is clicked
    $(document).on('click', '.edit-btn', function() {
        var candidateId = $(this).data('candidate-id');
        var candidateName = $(this).data('candidate-name');
        var candidateVision = $(this).data('candidate-vision');
        var candidateMission = $(this).data('candidate-mission');
        var candidateImagePath = $(this).data('candidate-image');

        // Update modal fields with new data
        $('#editCandidateModal').find('.modal-title').text('Edit Candidate');
        $('#editCandidateModal').find('#editCandidateId').val(candidateId);
        $('#editCandidateModal').find('#editName').val(candidateName);
        $('#editCandidateModal').find('#editVision').val(candidateVision);
        $('#editCandidateModal').find('#editMission').val(candidateMission);

        // Display candidate image if available
        if (candidateImagePath) {
            var img = '<img src="{{ asset('storage') }}/' + candidateImagePath + '" alt="' + candidateName + '" width="100">';
            $('#editCandidateModal').find('#editCurrentImage').html(img);
        } else {
            $('#editCandidateModal').find('#editCurrentImage').empty(); // Clear any existing image
        }

        $('#editCandidateModal').modal('show');
    });

    // Ensure the modal content is cleared when the modal is hidden
    $('#editCandidateModal').on('hidden.bs.modal', function() {
        $(this).find('form')[0].reset(); // Reset form fields
        $(this).find('#formErrors').html(''); // Clear any previous error messages
    });

    // Handle form submission
    $('#editCandidateForm').submit(function(e) {
        e.preventDefault();

        var formData = new FormData(this);
        var candidateId = $('#editCandidateId').val();

        $.ajax({
            url: $(this).attr('action').replace('__candidateId__', candidateId),
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log('Form submission successful');
                console.log('Response:', response);
                $('#editCandidateModal').modal('hide');

                // Update the corresponding row in the table with the updated data
                var $candidateRow = $('#candidate_row_' + candidateId);
                $candidateRow.find('.candidate-name').text(response.name);
                $candidateRow.find('.candidate-vision').text(response.vision);
                $candidateRow.find('.candidate-mission').text(response.mission);

                // Re-populate modal with updated data
                $('.edit-btn[data-candidate-id="' + candidateId + '"]').data('candidate-name', $('#editName').val());
                $('.edit-btn[data-candidate-id="' + candidateId + '"]').data('candidate-vision', $('#editVision').val());
                $('.edit-btn[data-candidate-id="' + candidateId + '"]').data('candidate-mission', $('#editMission').val());

                // Optionally update image display in UI if image is changed
                var candidateImagePath = response.image_path;
                if (candidateImagePath) {
                    var img = '<img src="{{ asset('storage') }}/' + candidateImagePath + '" alt="' + candidateName + '" width="100">';
                    $('#candidateImageContainer_' + candidateId).html(img);
                }
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

        </script>
@endpush
