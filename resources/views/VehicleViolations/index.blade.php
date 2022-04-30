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
                </svg> Create</button>

                <button type="button" class="btn btn-info text-white" data-bs-toggle="modal" data-bs-target="#searchModal">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg> Search</button>
                
            </div><!--//table-utilities-->
        </div><!--//col-auto-->
    </div><!--//row-->


    @include('vehicleviolations.modal')

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
                                    <th class="cell">Date and Time</th>
                                    <th class="cell">Plate No.</th>
                                    <th class="cell">Responsible</th>
                                    <th class="cell">Remarks</th>
                                    <th class="cell">Actions</th>
                                </tr>
                            </thead>
                            <!--DataTable Here -->

                            <tbody>
                               
                            </tbody>
                            
                        </table>
                    </div><!--//table-responsive-->

                </div><!--//app-card-body-->
            </div><!--//app-card-->
            <nav class="app-pagination">
                <ul class="pagination justify-content-center">

                </ul>
            </nav><!--//app-pagination-->

            

        </div><!--//tab-pane-->
    </div><!--//tab-content-->

</div>

@include('VehicleViolations.jquery')
@endsection
