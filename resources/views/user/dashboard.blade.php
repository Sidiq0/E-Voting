@extends('layouts.adminlte')

@section('page-title', 'Vote')
@section('breadcrumb', 'Vote')

@section('content')

            <!-- Row for Numbers -->
<div class="card">
    <div class="card-header">
        <h1>Pilih Kandidat Terbaik</h1>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Kandidat</th>
                        <th>Visi</th>
                        <th>Misi</th>
                        <th>Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($candidates as $candidate)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @if($candidate->image_path)
                                    <img src="{{ asset('storage/' . $candidate->image_path) }}" alt="{{ $candidate->name }}" width="100">
                                @endif
                            </td>
                            <td>{{ $candidate->name }}</td>
                            <td>{{ $candidate->vision }}</td>
                            <td>{{ $candidate->mission }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-primary btn-sm mr-2 edit-btn"
                                            data-toggle="modal"
                                            data-target="#candidateModal"
                                            data-name="{{ $candidate->name }}"
                                            data-vision="{{ $candidate->vision }}"
                                            data-mission="{{ $candidate->mission }}"
                                            data-image="{{ asset('storage/' . $candidate->image_path) }}">
                                        Detail
                                    </button>
                                    <form class="voteForm" method="POST" action="{{ route('vote.store') }}">
                                        @csrf
                                        <input type="hidden" name="candidate_id" value="{{ $candidate->id }}">
                                        <button type="submit">Vote</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-right"></ul>
    </div>

    <!-- Modal Structure -->
    <div class="modal fade" id="candidateModal" tabindex="-1" role="dialog" aria-labelledby="candidateModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="candidateModalLabel">Detail Kandidat</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div id="candidateDetails"></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Warning Structure -->
    <div class="modal fade" id="warningModal" tabindex="-1" role="dialog" aria-labelledby="warningModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="warningModalLabel">Warning</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              You have already voted!
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    $('#candidateModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var name = button.data('name');
        var vision = button.data('vision');
        var mission = button.data('mission');
        var image = button.data('image');

        var modal = $(this);
        var detailsHtml = `
            <div class="text-center">
                <img src="${image}" alt="${name}" width="100">
            </div>
            <h5 class="mt-3">${name}</h5>
            <p><strong>Vision:</strong> ${vision}</p>
            <p><strong>Mission:</strong> ${mission}</p>
        `;

        modal.find('#candidateDetails').html(detailsHtml);
    });

    $('body').on('submit', '.voteForm', function(event) {
        event.preventDefault(); // Prevent the default form submission

        var $form = $(this);

        $.ajax({
            url: $form.attr('action'),
            method: 'POST',
            data: $form.serialize(),
            success: function(response) {
                console.log(response);
                if (response.existingVote) {
                    $('#warningModal').modal('show');
                } else {
                    // Handle successful vote
                    alert('Vote successful!');
                }
            },
            error: function() {
                alert('An error occurred. Please try again.');
            }
        });
    });
});
    </script>

@endpush
