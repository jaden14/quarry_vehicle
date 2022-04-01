@extends('layouts.app')

@section('content')
<div class="container-xl">

    <!-- Button trigger modal -->
    <button type="button" class="btn-sm app-btn-secondary px-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add</button>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="d-flex justify-content-between">
                <ul class="nav nav-tabs mt-3">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Quarry</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sub Quarry</a>
                    </li>
                </ul>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        
        <div class="modal-body">
            <form action="quarry" method="POST">
                @csrf
            <div class="row g-2">
                <div class="col-6">
                    <div class="card border-start-0 border-top-0 border-bottom-0 rounded-0 ">
                        <div class="card-body px-4">

                            <div class="row g-3 mb-3 align-items-center justify-content-between">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input id ="dateApplied" class="form-control" type="date" name="dateApplied"/>
                                        <label for="dateApplied">Date Applied</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" id="quarryTypes" name="quarryTypes">
                                            <option value="CSAG">CSAG</option>
                                            <option value="CE">CE</option>
                                            <option value="ISAG">ISAG</option>
                                        </select>
                                        <label for="quarryTypes">Quarry Types</label>
                                    </div>
                                </div>
                            </div>
    
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="controlNum" name="controlNum" placeholder="Control No.">
                                        <label for="controlNum">Control Number</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md">
                                    <div class="form-floating mt-3">
                                        <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                                        <label for="name">Name</label>
                                    </div>
                                </div>
                            </div>


                            <div class="row g-2 mt-2">
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="busName" placeholder="Bus Name" name="busName">
                                        <label for="busName">Bus Name</label>
                                    </div>
                                </div>
                                
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="busAddress" placeholder="Bus Address" name="busAddress">
                                        <label for="busAddress">Bus Address</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-2 mt-2">
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="contactPerson" placeholder="Contact Person" name="contactPerson">
                                        <label for="contactPerson">Contact Person</label>
                                    </div>
                                </div>
                            
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="contactNum" placeholder="Contact Number" name="contactNum">
                                        <label for="contactNum">Contact Number</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-2 mt-2">
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="postalAddress" placeholder="Postal Address" name="postalAddress">
                                        <label for="postalAddress">Postal Address</label>
                                    </div>
                                </div>

                                <div class="col-md">
                                    <div class="form-floating">
                                        <select class="form-select" id="municipality" name="municipality">
                                            @foreach($municipalities as $municipality)
                                            <option value="{{$municipality['id']}}">{{$municipality->munname}}</option>
                                            @endforeach
                                        </select>
                                        <label for="municipality">Municipality</label>
                                    </div>
                                </div>

                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="status" placeholder="Status" name="status">
                                        <label for="status">Status</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="col-6">
                    <div class="card border-0">
                        <div class="card-body">

                            <div class="col-auto mt-1 mb-3">
                                <h6 class="">Actions Taken</h6>
                            </div>

                            <div class="row g-2">
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="firstNotice" placeholder="First Notice" name="firstNotice">
                                        <label for="firstNotice">First Notice</label>
                                    </div>
                                </div>
                                
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input id ="firstNoticeDate" class="form-control" type="date" name="firstNoticeDate"/>
                                        <label for="firstNoticeDate">Date</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-2 mt-0">
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="secondNotice" placeholder="Second Notice" name="secondNotice">
                                        <label for="secondNotice">Second Notice</label>
                                    </div>
                                </div>
                                
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input id ="secondNoticeDate" class="form-control" type="date" name="secondNoticeDate"/>
                                        <label for="secondNoticeDate">Date</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-2 mt-0">
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="thirdNotice" placeholder="Third Notice" name="thirdNotice">
                                        <label for="thirdNotice">Third Notice</label>
                                    </div>
                                </div>
                                
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input id ="thirdNoticeDate" class="form-control" type="date" name="thirdNoticeDate"/>
                                        <label for="thirdNoticeDate">Date</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-floating mt-4">
                                <textarea class="form-control" placeholder="Remarks" id="remarks" style="height: 100px"  name="remarks"></textarea>
                                <label for="remarks">Remarks</label>
                                <p class="mt-3" id="dateLastUpdated" name="dateLastUpdated">Date last updated:</p>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary text-white" id="submitBtn">Submit</button>
        </div>
        
        </form>
        

        

    </div>
    </div>
    </div>

    <!-- Table -->
    <div class="tab-content mt-3" id="orders-table-tab-content">
        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body">
                    <div class="table-responsive">
                        <table class="table app-table-hover mb-0 text-left">
                            <thead>
                                <tr>
                                    <th class="cell">Control No.</th>
                                    <th class="cell">Name</th>
                                    <th class="cell">Municipality</th>
                                    <th class="cell">Date Applied</th>
                                    <th class="cell">Status</th>
                                    <th class="cell">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach($quarries as $quarry)
                                    <tr>
                                        <input type="hidden" class="delete-id" value="{{$quarry['id']}}">
                                        <td class="cell">{{$quarry->control_number}}</td>
                                        <td class="cell">{{$quarry->name}}</td>
                                        <td class="cell">{{$quarry->municipality}}</td>
                                        <td class="cell">{{$quarry->date_applied}}</td>
                                        <td class="cell">{{$quarry->status}}</td>
                                        <td class="cell"><a id="editForm" class="btn-sm app-btn-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdropEdit" data-quarry-info="{{$quarry}}">Edit</a>
                                        <button class="btn-sm app-btn-secondary deletebutton" id="{{$quarry['id']}}">Delete</button>
                                        </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>


        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="staticBackdropEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Quarry</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">

            <form action="editQuarry" id="quarryEdit" method="POST">
                @csrf
                @method('PUT')
            <div class="row g-2">
                <div class="col-6">
                    <div class="card border-start-0 border-top-0 border-bottom-0 rounded-0 ">
                        <div class="card-body px-4">

                            <div class="row g-3 mb-3 align-items-center justify-content-between">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input id ="dateApplied" class="form-control" type="date" name="dateApplied"/>
                                        <label for="dateApplied">Date Applied</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" id="quarryTypes" name="quarryTypes">
                                            <option value="CSAG">CSAG</option>
                                            <option value="CE">CE</option>
                                            <option value="ISAG">ISAG</option>
                                        </select>
                                        <label for="quarryTypes">Quarry Types</label>
                                    </div>
                                </div>
                            </div>
    
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="controlNum" name="controlNum" placeholder="Control No." disabled>
                                        <label for="controlNum">Control Number</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md">
                                    <div class="form-floating mt-3">
                                        <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                                        <label for="name">Name</label>
                                    </div>
                                </div>
                            </div>


                            <div class="row g-2 mt-2">
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="busName" placeholder="Bus Name" name="busName">
                                        <label for="busName">Bus Name</label>
                                    </div>
                                </div>
                                
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="busAddress" placeholder="Bus Address" name="busAddress">
                                        <label for="busAddress">Bus Address</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-2 mt-2">
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="contactPerson" placeholder="Contact Person" name="contactPerson">
                                        <label for="contactPerson">Contact Person</label>
                                    </div>
                                </div>
                            
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="contactNum" placeholder="Contact Number" name="contactNum">
                                        <label for="contactNum">Contact Number</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-2 mt-2">
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="postalAddress" placeholder="Postal Address" name="postalAddress">
                                        <label for="postalAddress">Postal Address</label>
                                    </div>
                                </div>

                                <div class="col-md">
                                    <div class="form-floating">
                                        <select class="form-select" id="municipality" name="municipality">
                                            <option value="One">One</option>
                                            <option value="Two">Two</option>
                                            <option value="Three">Three</option>
                                        </select>
                                        <label for="municipality">Municipality</label>
                                    </div>
                                </div>

                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="status" placeholder="Status" name="status" disabled>
                                        <label for="status">Status</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="col-6">
                    <div class="card border-0">
                        <div class="card-body">

                            <div class="col-auto mt-1 mb-3">
                                <h6 class="">Actions Taken</h6>
                            </div>

                            <div class="row g-2">
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="firstNotice" placeholder="First Notice" name="firstNotice">
                                        <label for="firstNotice">First Notice</label>
                                    </div>
                                </div>
                                
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input id ="firstNoticeDate" class="form-control" type="date" name="firstNoticeDate"/>
                                        <label for="firstNoticeDate">Date</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-2 mt-0">
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="secondNotice" placeholder="Second Notice" name="secondNotice">
                                        <label for="secondNotice">Second Notice</label>
                                    </div>
                                </div>
                                
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input id ="secondNoticeDate" class="form-control" type="date" name="secondNoticeDate"/>
                                        <label for="secondNoticeDate">Date</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-2 mt-0">
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="thirdNotice" placeholder="Third Notice" name="thirdNotice">
                                        <label for="thirdNotice">Third Notice</label>
                                    </div>
                                </div>
                                
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input id ="thirdNoticeDate" class="form-control" type="date" name="thirdNoticeDate"/>
                                        <label for="thirdNoticeDate">Date</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-floating mt-4">
                                <textarea class="form-control" placeholder="Remarks" id="remarks" style="height: 100px"  name="remarks"></textarea>
                                <label for="remarks">Remarks</label>
                            </div>

                            <div class="row g-2 mt-3">
                                <label for="dateLastUpdated" class="col-sm-2 col-form-label">Date Last Updated</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="dateLastUpdated" name="dateLastUpdated">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="modal-footer">
            <button type="submit" id="submit" class="btn btn-primary text-white">Save Changes</button>
        </div>
        
        </form>

        

    </div>
    </div>
    </div>
    
    
@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="/assets/js/quarry.js"></script>
<script src="/assets/js/deleteConfirmation.js"></script>
<script src="/assets/js/quarry-toast.js"></script>
@endsection
