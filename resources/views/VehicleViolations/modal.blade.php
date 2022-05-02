<!--Create Modal -->
<div class="modal fade" id="vehicleviolations" tabindex="-1" aria-labelledby="vehicleviolationsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Vehicle Violations</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            
            <ul id="saveform_errList">
            </ul>

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="date">Date</label>
                                <input type="date" class="form-control date" id="Date" name="date" required>
                            </div> 
                            <div class="col-md-4"> 
                                <label for="time">Time</label>
                                <input type="time" class="form-control time" id="time" name="time" required>
                            </div> 
                            <div class="col-md-4"> 
                                <label for="plateno">Plate No.</label>
                                <input type="text" class="form-control plateno" id="plateno" name="plateno" placeholder="Plate Number" required>
                            </div>
                                        
                        </div>
                    </div>
                    <div class="col-md-12"> 
                        <label for="responsible" class="col-form-label">Responsible</label>
                        <input type="text" class="form-control responsible" id="responsible" name="responsible" placeholder="Responsible" autofocus>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                        <label for="Conveyance" class="col-form-label">Conveyance Type</label>
                        <select class="form-select conveyance_type" name="conveyance_type" id="conveyance_type">

                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="inputAddress2" class="col-form-label">Violation</label>
                        <select class="form-select violation_type" name="violation_type" id="violation_type">

                        </select>
                    </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="inputAddress2" class="col-form-label">Remarks</label>
                        <input type="text" class="form-control remarks" id="remarks" placeholder="Remarks" name="remarks">
                        
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn app-btn-primary create_vehicleviolation">Save</button>
                <button type="button" class="btn app-btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </form>
    </div>
</div><!--//End Create Modal-->

<!--View Modal -->
<div class="modal fade" id="view_vehicleviolations" tabindex="-1" aria-labelledby="vehicleviolationsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View - Vehicle Violations</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="row">
                        <div class="col-md-4">
                            <span id="date"></span>
                        </div>
                        <div class="col-md-4">
                            <span id="time"></span>
                        </div>
                        <div class="col-md-4">
                            <span id="plate_no"></span>
                        </div>
                    </div>    
                    <span id="responsible"></span>
                    <div class="row">
                        <div class="col-md-6">
                            <span id="conveyance"></span>
                        </div>
                        <div class="col-md-6">
                            <span id="violation"></span>
                        </div>
                    </div>   
                    <span id="remarks"></span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn app-btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
    </div>
</div><!--//End View Modal-->

<!--Edit Modal -->
<div class="modal fade" id="edit_vehicleviolations" tabindex="-1" aria-labelledby="vehicleviolationsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit - Vehicle Violations</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body">
                <div class="form-row">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="date">Date:</label>
                            <input type="date" class="form-control" id="edit_date" style="background-color:#A6FFC2">
                        </div>
                        <div class="col-md-4">
                            <label for="date">Time:</label>
                            <input type="time" class="form-control" id="edit_time" style="background-color:#A6FFC2">
                        </div>
                        <div class="col-md-4">
                            <label for="date">Plate No.</label>
                            <input type="text" class="form-control" id="edit_plateno" style="background-color:#A6FFC2">
                        </div>
                    </div>
                    <div class="col-md-12"> 
                        <label for="responsible" class="col-form-label">Responsible</label>
                        <input type="text" class="form-control" id="edit_responsible" style="background-color:#A6FFC2">
                    </div>    
                    
                    <div class="row">
                        <div class="col-md-6">
                            <label for="Conveyance" class="col-form-label">Conveyance Type</label>
                            <select class="form-select conveyance_type" name="conveyance_type" id="edit_conveyance_type" style="background-color:#A6FFC2">

                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="inputAddress2" class="col-form-label">Violation</label>
                            <select class="form-select violation_type" name="violation_type" id="edit_violation_type" style="background-color:#A6FFC2">

                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn app-btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
    </div>
</div><!--//End Edit Modal-->

<!--Search Modal -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="vehicleviolationsModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-centered">
                    <form method="GET" action="{{ url('/search')}}">
                    @csrf
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Quick Search</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="plate_no">Plate No.</label>
                                        <input type="text" class="form-control" name="plate_no" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="plate_no">Responsible</label>
                                        <input type="text" class="form-control" name="responsible" required>
                                    </div>         
                                </div>
                            </div>
                        </div>    
                        <div class="modal-footer">
                            <button type="submit" class="btn app-btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg> Search</button>
                            <button type="button" class="btn app-btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </form>
                </div>
</div><!--//End of Modal-->


