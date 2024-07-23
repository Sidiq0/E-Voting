<!-- Modal for editing candidate details -->
<div class="modal fade" id="editCandidateModal" tabindex="-1" role="dialog" aria-labelledby="editCandidateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Modal header -->
            <div class="modal-header">
                <h5 class="modal-title" id="editCandidateModalLabel">Edit Candidate</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form id="editCandidateForm" method="POST" action="{{ route('admin.candidates.update', ['candidate' => '__candidateId__']) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="editCandidateId" name="id" value="">
                    <div class="form-group">
                        <label for="editName">Name</label>
                        <input type="text" class="form-control" id="editName" name="name" value="">
                    </div>
                    <div class="form-group">
                        <label for="editVision">Vision</label>
                        <textarea class="form-control" id="editVision" name="vision"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="editMission">Mission</label>
                        <textarea class="form-control" id="editMission" name="mission"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="editImage">Image</label>
                        <input type="file" class="form-control-file" id="editImage" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
            <!-- Modal footer with close button -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
