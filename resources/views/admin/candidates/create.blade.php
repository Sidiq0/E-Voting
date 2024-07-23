<div class="modal fade" id="createCandidateModal" tabindex="-1" role="dialog" aria-labelledby="createCandidateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Modal header -->
            <div class="modal-header">
                <h5 class="modal-title" id="createCandidateModalLabel">Create Candidate</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <!-- Form for creating a candidate -->
                <form method="POST" action="{{ route('admin.candidates.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required>
                    </div>
                    <div class="form-group">
                        <label for="vision">Vision:</label>
                        <textarea class="form-control" id="vision" name="vision" placeholder="Enter vision" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="mission">Mission:</label>
                        <textarea class="form-control" id="mission" name="mission" placeholder="Enter mission" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Image:</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                    </div>
                    <!-- Modal footer with buttons -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
