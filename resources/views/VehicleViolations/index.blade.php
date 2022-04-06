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

    <!--Table Here-->
    <div class="tab-content" id="orders-table-tab-content">
        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body">
                    <div class="table-responsive">
                        <table class="table app-table-hover mb-0 text-left">
                            <thead>
                                <tr>
                                    <th class="cell">ID</th>
                                    <th class="cell">Date</th>
                                    <th class="cell">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($vehicleviolations as $vehicleviolation)
                                    <tr>
                                        <td class="cell">{{ $vehicleviolation->id }}</td>
                                        <td class="cell"><span class="truncate">{{ $vehicleviolation->date}}</span></td>
                                        <td class="cell">
                                            Action Goes Here
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="cell" colspan="2"><span class="truncate">No Data</span></td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div><!--//table-responsive-->

                </div><!--//app-card-body-->
            </div><!--//app-card-->
            <nav class="app-pagination">
                {{--  {!! $conveyances->links() !!}  --}}
            </nav><!--//app-pagination-->

        </div><!--//tab-pane-->
    </div><!--//tab-content-->

</div>
@endsection
