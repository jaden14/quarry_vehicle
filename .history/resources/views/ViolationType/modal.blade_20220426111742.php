<!-- Create Modal -->
<div class="modal fade" id="CreateViolationTypeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add ViolationType</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <ul id="saveform_errList">
            </ul>

            <div class="form-group mb-3">
                <label for="">Description</label>
                <input type="text" class="form-control description">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary create_violationtype">Save changes</button>
        </div>
        </div>
    </div>
</div>

<!-- Edit Student Modal -->
<div class="modal fade" id="EditViolationTypeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <ul id="updateform_errList">

            </ul>

            <div class="form-group mb-3 d-none">
                <label for="">Record ID</label>
                <input type="text" class="form-control name" id="edit_id">
            </div>

            <div class="form-group mb-3">
                <label for="">Description</label>
                <input type="text" class="form-control name" id="edit_description">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary update_violationtype">Save changes</button>
        </div>
        </div>
    </div>
</div>
