@extends('layouts.app')

@section('content')
<div class="container-xl">

    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Vehicle Violations</h1>
        </div>
        <div class="col-auto">
            <div class="page-utilities">
                <div class="col-auto">

                    <button type="button" class="btn app-btn-primary" data-toggle="modal" data-target=".vehicleviolations-modal-lg">Add</button>

                </div><!--//col-->
            </div><!--//table-utilities-->
        </div><!--//col-auto-->
    </div><!--//row-->

    <!-- Create Violatin Type Modal -->
    <div class="modal fade vehicleviolations-modal-lg" tabindex="-1" role="dialog" aria-labelledby="addVehicleViolations" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-centered">
            <div class="modal-content">
            <form action="{{ route('vehicleviolations.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="vehicleviolation-text">Vehicle Violations</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="date">Date</label>
                                <input type="date" class="form-control" id="Date">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="time">Time</label>
                                <input type="time" class="form-control" id="time">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="plateno">Plate No.</label>
                                <input type="text" class="form-control" id="plateno" placeholder="Plate Number">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="responsible">Responsible</label>
                                <input type="text" class="form-control" id="responsible" placeholder="Responsible">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="Conveyance">Conveyance Type</label>
                                <select class="form-select col-md-12">
                                    <option selected="" value="option-1">Select here</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputAddress2">Violation</label>
                                <select class="form-select col-md-12">
                                    <<option selected="" value="option-1">Select here</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputAddress2">Remarks</label>
                                <input type="text" class="form-control" id="inputAddress2" placeholder="Remarks">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn app-btn-secondary">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
