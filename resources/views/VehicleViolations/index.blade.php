@extends('layouts.app')

@section('content')
<div class="container-xl"> 
    <h1 class="app-page-title">Vehicle Violations</h1>
    <div class="app-card shadow-sm mb-4 border-left-decoration">
        <div class="inner">
            <div class="app-card-body p-4">
                <div class="row gx-5 gy-3">
                    <div class="col-12 col-lg-10">
                        <form>
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
                                <option selected="" value="option-1">All</option>
                                <option value="option-2">This week</option>
                                <option value="option-3">This month</option>
                                <option value="option-4">Last 3 months</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputAddress2">Violation</label>
                            <select class="form-select col-md-12">
                                <option selected="" value="option-1">All</option>
                                <option value="option-2">This week</option>
                                <option value="option-3">This month</option>
                                <option value="option-4">Last 3 months</option>
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="inputAddress2">Remarks</label>
                            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                        </div>

                        </div>
                        </form><!--//end-form-->

                        <table class="table app-table-hover mb-0 text-left table-bordered">
                            <thead>
                                <tr>
                                    <th class="cell">ID</th>
                                    <th class="cell">Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Sample Data 1</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Sample Data 2</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-12 col-lg-2">
                        <table>
                        <tr>
                        <td>
                        <a class="btn app-btn-primary" href="https://www.chartjs.org/docs/latest/" target="_blank"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up-right-square me-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"></path>
                        <path fill-rule="evenodd" d="M5.172 10.828a.5.5 0 0 0 .707 0l4.096-4.096V9.5a.5.5 0 1 0 1 0V5.525a.5.5 0 0 0-.5-.5H6.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707z"></path>
                        </svg>Add</a>
                        </td>
                        </tr>
                        <tr>
                        <td>
                        <a class="btn app-btn-secondary" href="https://www.chartjs.org/docs/latest/" target="_blank"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up-right-square me-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"></path>
                        <path fill-rule="evenodd" d="M5.172 10.828a.5.5 0 0 0 .707 0l4.096-4.096V9.5a.5.5 0 1 0 1 0V5.525a.5.5 0 0 0-.5-.5H6.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707z"></path>
                        </svg>Edit</a>
                        </td>
                        </tr>
                        <tr>
                        <td>
                        <a class="btn app-btn-secondary" href="https://www.chartjs.org/docs/latest/" target="_blank"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up-right-square me-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"></path>
                        <path fill-rule="evenodd" d="M5.172 10.828a.5.5 0 0 0 .707 0l4.096-4.096V9.5a.5.5 0 1 0 1 0V5.525a.5.5 0 0 0-.5-.5H6.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707z"></path>
                        </svg>Delete</a>
                        </td>
                        </tr>
                        </table>   
                    </div><!--//col-->
                </div><!--//row-->

            </div><!--//app-card-body-->
            
        </div><!--//inner-->
    </div><!--//app-card-->
</div>
@endsection
