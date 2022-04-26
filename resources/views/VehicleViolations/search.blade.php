@extends('layouts.app')

@section('content')
<div class="container-xl">

    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Search Results</h1>
            <h6>You search for: '{{ $search_text_one = $_GET['plate_no']; }}' and '{{ $search_text_one = $_GET['responsible']; }}'</h6>
        </div>
        <div class="col-auto">
            <div class="page-utilities">
                <!-- Button trigger modal -->
                <a href="{{ url('/vehicleviolations')}}" class="btn btn-warning text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                </svg> Back</a>

                <button type="button" class="btn btn-info text-white" data-bs-toggle="modal" data-bs-target="#searchModal">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg> Search</button>
                
                <!--Search Modal -->
                <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="vehicleviolationsModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-centered">
                    <form method="GET" action="">
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
                                    <th class="cell">Action</th>
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
                                            <button type="button" class="btn-sm app-btn-secondary" data-bs-toggle="modal" data-bs-target="#viewViolations{{ $vehicleviolation->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                            </svg> View</button>
                                        </td>

                                        
                                        
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

        </div><!--//tab-pane-->
    </div><!--//tab-content-->

</div>
@endsection
