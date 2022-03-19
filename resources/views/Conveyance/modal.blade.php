<!-- Conveyance Create Modal -->
<div class="modal fade" id="createConveyance" tabindex="-1" role="dialog" aria-labelledby="createConveyanceLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="createConveyanceLabel">Create Conveyance</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form class="table-search-form row gx-1 align-items-center" action="{{ route('conveyance.store') }}" method="POST">
                    @csrf
            <div class="modal-body">
                <input type="text" name="description" class="form-control search-orders">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary text-white">Save</button>
            </div>
            </div>
        </form>
    </div>
</div>

<!-- Conveyance Delete Modal -->
<div class="modal fade" id="deleteConveyance" tabindex="-1" role="dialog" aria-labelledby="deleteConveyanceLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="deleteConveyanceLabel">Are you sure you wann delete this?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p>Do you really want to delete this record? This process cannot be undone.</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-danger text-white">Delete</button>
        </div>
        </div>
    </div>
</div>
