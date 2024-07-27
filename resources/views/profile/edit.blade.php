<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="dynamic-width-card">
            <div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('profile.update', $user) }}" id="editProfileForm">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="userName">Name</label>
                                    <input type="text" class="form-control" id="userName" name="name" value="{{ $user->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="userEmail">Email</label>
                                    <input type="email" class="form-control" id="userEmail" name="email" value="{{ $user->email }}">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="document.getElementById('editProfileForm').submit();">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
</div>
</div>
</div>
