@extends('layouts.app')

@section('content')
<div class="container-xl">

    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Vehicle Violations</h1>
        </div>
        <div class="col-auto">
            <div class="page-utilities">
                <!-- Button trigger modal -->
                <button type="button" class="btn app-btn-primary" data-bs-toggle="modal" data-bs-target="#vehicleviolations">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                </svg> Add</button>

                <button type="button" class="btn btn-info text-white" data-bs-toggle="modal" data-bs-target="#searchModal">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg> Search</button>
                
                <!--Add Modal -->
                <div class="modal fade" id="vehicleviolations" tabindex="-1" aria-labelledby="vehicleviolationsModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-centered">
                    <form action="{{ route('vehicleviolations.store') }}" method="POST">
                    @csrf
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Vehicle Violations</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="date">Date</label>
                                            <input type="date" class="form-control" id="Date" name="date" required>
                                        </div> 
                                        <div class="col-md-4"> 
                                            <label for="time">Time</label>
                                            <input type="time" class="form-control" id="time" name="time" required>
                                        </div> 
                                        <div class="col-md-4"> 
                                            <label for="plateno">Plate No.</label>
                                            <input type="text" class="form-control" id="plateno" name="plate_no" placeholder="Plate Number" required>
                                        </div>
                                                  
                                    </div>
                                </div>
                                <div class="col-md-12"> 
                                    <label for="responsible" class="col-form-label">Responsible</label>
                                    <input type="text" class="form-control" id="responsible" name="responsible" placeholder="Responsible">
                                </div>
                                <div class="row">
                                <div class="col-md-6">
                                    <label for="Conveyance" class="col-form-label">Conveyance Type</label>
                                    <select class="form-select col-md-12" name="conveyance_type" required>
                                        @foreach($conveyances as $conveyance)
                                        <option value="{{ $conveyance->description }}">{{ $conveyance->description }}</option>
                                        @endforeach 
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputAddress2" class="col-form-label">Violation</label>
                                    <select class="form-select col-md-12" name="violation_type">
                                        @foreach($violationtypes as $violationtype)
                                        <option value="{{ $violationtype->description }}">{{ $violationtype->description }}</option>
                                        @endforeach 
                                    </select>
                                </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputAddress2" class="col-form-label">Remarks</label>
                                    <input type="text" class="form-control" id="inputAddress2" placeholder="Remarks" name="remarks">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn app-btn-primary">Save</button>
                            <button type="button" class="btn app-btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </form>
                </div>
                </div><!--//End of Modal-->


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


            </div><!--//table-utilities-->
        </div><!--//col-auto-->
    </div><!--//row-->

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
                                    <th class="cell">Plate No.</th>
                                    <th class="cell">Responsible</th>
                                    <th class="cell">Remarks</th>
                                    <th class="cell">Actions</th>
                                </tr>
                            </thead>

                           <div class="container">
                            <tbody>
                                @forelse($vehicleviolations as $vehicleviolation)
                                    <tr>
                                        <td class="cell">{{ $vehicleviolation->id }}</td>
                                        <td class="cell"><span>{{ date('M\. d\, Y', strtotime($vehicleviolation->date)) }}</span><span class="note">{{date('g:i a', strtotime($vehicleviolation->time)) }}</span></td>
                                        <td class="cell">{{ $vehicleviolation->plate_no}}</td>
                                        <td class="cell">{{ $vehicleviolation->responsible}}</td>
                                        <td class="cell"><span class="note">{{ $vehicleviolation->remarks}}</span></td>
                                        <td class="cell">
                                            <button type="button" class="btn-sm app-btn-secondary" data-bs-toggle="modal" data-bs-target="#editViolations{{ $vehicleviolation->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                            </svg> Update</button>
                                            <button type="button" class="btn-sm app-btn-secondary" data-bs-toggle="modal" data-bs-target="#viewViolations{{ $vehicleviolation->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                            </svg> View</button>
                                            <button type="button" class="btn-sm app-btn-secondary" data-bs-toggle="modal" data-bs-target="#deleteViolations{{ $vehicleviolation->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                </svg> Delete</button>
                                        </td>

                                        <!-- Edit Violations Modal -->
                                        <div class="modal fade" id="editViolations{{ $vehicleviolation->id }}" tabindex="-1" aria-labelledby="editViolationsModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-centered">
                                                <form action="{{ route('vehicleviolations.update', $vehicleviolation) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Vehicle Violations</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-row">
                                                                <div class="form-group col-md-12">
                                                                    <div class="row">
                                                                    <div class="col-md-4">
                                                                        <label for="date">Date</label>
                                                                        <input type="date" class="form-control" id="Date" name="date" value="{{ $vehicleviolation->date }}" required >
                                                                    </div> 
                                                                    <div class="col-md-4"> 
                                                                        <label for="time">Time</label>
                                                                        <input type="time" class="form-control" id="time" name="time" value="{{ $vehicleviolation->time }}" required>
                                                                    </div> 
                                                                    <div class="col-md-4"> 
                                                                        <label for="plateno">Plate No.</label>
                                                                        <input type="text" class="form-control" id="plateno" name="plate_no" value="{{ $vehicleviolation->plate_no }}" required>
                                                                    </div> 
                                                                </div>
                                                            </div>

                                                        <div class="col-md-12"> 
                                                            <label for="responsible" class="col-form-label">Responsible</label>
                                                            <input type="text" class="form-control" id="responsible" name="responsible" value="{{ $vehicleviolation->responsible }}" >
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="Conveyance" class="col-form-label">Conveyance Type</label>
                                                                <div class="form-group">
                                                                <select class="form-select col-md-12" name="conveyance_type">
                                                                    @foreach($conveyances as $conveyance)
                                                                        <option value="{{ $conveyance->description }}" @if($vehicleviolation->conveyance_type == $conveyance->description) selected @endif>{{ $conveyance->description }}</option>
                                                                    @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="inputAddress2" class="col-form-label">Violation Type</label>
                                                                <div class="form-group">
                                                                <select class="form-select col-md-12" name="violation_type">
                                                                    @foreach($violationtypes as $violationtype)
                                                                    <option value="{{ $violationtype->description }}" @if($vehicleviolation->violation_type == $violationtype->description) selected @endif>{{ $violationtype->description }}</option>
                                                                    @endforeach 
                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                            <div class="form-group col-md-12">
                                                                <label for="inputAddress2" class="col-form-label">Remarks</label>
                                                                <input type="text" class="form-control" id="inputAddress2" placeholder="Remarks" name="remarks" value="{{ $vehicleviolation->remarks }}" >
                                                            </div>
                                                        </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn app-btn-primary">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                            </svg> Update</button>
                                                            <button type="button" class="btn app-btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                        </div>
                                        
                                        <!--View Modal -->
                                        <div class="modal fade" id="viewViolations{{ $vehicleviolation->id }}" tabindex="-1" aria-labelledby="vehicleviolationsModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Vehicle Violations</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label class="col-form-label">Plate No:</label> 
                                                                    <input type="text" class="form-control" readonly value="{{ $vehicleviolation->plate_no }}">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label class="col-form-label">Date of Violation:</label> 
                                                                    <input type="text" class="form-control" readonly value="{{ date('M\. d\, Y', strtotime($vehicleviolation->date)) }}">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label class="col-form-label">Time of Violation:</label> 
                                                                    <input type="text" class="form-control" readonly value="{{date('g:i a', strtotime($vehicleviolation->time)) }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label class="col-form-label">Responsible:</label> 
                                                                    <input type="text" class="form-control" readonly value="{{ $vehicleviolation->responsible }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label class="col-form-label">Conveyance Type:</label> 
                                                                    <input type="text" class="form-control" readonly value="{{ $vehicleviolation->conveyance_type }}">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="col-form-label">Violation Type:</label> 
                                                                    <input type="text" class="form-control" readonly value="{{ $vehicleviolation->violation_type }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <div class="col-md-12">
                                                                <label class="col-form-label">Remarks:</label> 
                                                                <input type="text" class="form-control" readonly value="{{ $vehicleviolation->remarks }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn app-btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!--//End of View-->

                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="deleteViolations{{ $vehicleviolation->id }}" tabindex="-1" aria-labelledby="deleteViolationsModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-centered">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteViolationsLabel">Delete</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <form class="table-search-form row gx-1 align-items-center" action="{{ route('vehicleviolations.destroy', $vehicleviolation->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-body">
                                                        <p>Do you really want to delete this record? This process cannot be undone.</p>
                                                    </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-danger text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                    </svg> Yes</button>
                                                    <button type="button" class="btn app-btn-secondary" data-bs-dismiss="modal">No</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div><!--//End of Delete-->
                                        

                                    </tr>
                                @empty
                                    <tr>
                                        <td class="cell" colspan="6"><span class="truncate">No Data</span></td>
                                    </tr>
                                @endforelse
                            </tbody>
                            
                        </table>
                    </div><!--//table-responsive-->

                </div><!--//app-card-body-->
            </div><!--//app-card-->
            <nav class="app-pagination">
                <ul class="pagination justify-content-center">
                {!! $vehicleviolations->links() !!}
                </ul>
            </nav><!--//app-pagination-->

            

        </div><!--//tab-pane-->
    </div><!--//tab-content-->

</div>
@endsection
