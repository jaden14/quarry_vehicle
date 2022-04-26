<!-- Violation Create Modal -->
<div class="modal fade" id="createViolation" tabindex="-1" aria-labelledby="createViolationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="createViolationLabel">Create Violation Type</h5>
            <button type="button" class="btn" data-bs-dismiss="modal">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form class="table-search-form row gx-1 align-items-center" action="{{ route('violationtype.store') }}" method="POST">
                    @csrf
            <div class="modal-body">
                <input type="text" name="description" class="form-control" id="VehicleViolationType">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary text-white">Save</button>
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </form>
    </div>
</div>




