@extends('layouts.app')

@section('content')
<div class="container-xl">

    <!-- Button trigger modal -->
    <button type="button" class="btn-sm app-btn-secondary px-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add</button>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <ul class="nav nav-tabs mt-3 pl-2 " role="tablist">
                    <li class="nav-item">
                        <button class="nav-link text-success active" role="tab" data-bs-toggle="tab" id="quarry-tab" data-bs-target="#quarryTab" aria-controls="quarryTab" aria-selected="true">Quarry</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link text-success" role="tab" data-bs-toggle="tab" id="sub-quarry-tab" data-bs-target="#subQuarryTab" aria-controls="subQuarryTab" aria-selected="false">Sub Quarry</button>
                    </li>
                    <button type="button" class="btn-close position-absolute top-10 end-0 pr-5" data-bs-dismiss="modal" aria-label="Close"></button>
                </ul>

                <div class="modal-body" style="height:500px;">
                    <form action="quarry" method="POST" class="tab-content">
                        @csrf
                        <div class="tab-pane fade show active" role="tabpanel" id="quarryTab" aria-labelledby="quarry-tab">
                            <div class="row g-2">
                                <div class="col-6">
                                    <div class="card border-start-0 border-top-0 border-bottom-0 rounded-0 ">
                                        <div class="card-body px-4">
                                            <div class="row g-3 mb-3 align-items-center justify-content-between">
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input id="dateApplied" class="form-control" type="date" name="dateApplied" />
                                                        <label for="dateApplied">Date Applied</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <select class="form-select" id="quarryTypes" name="quarryTypes">
                                                            <option selected disabled>Select Option</option>
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
                                                        <input type="text" class="form-control" id="controlNum" name="controlNum" placeholder="Control No." readonly="readonly">
                                                        <label for="controlNum">Control Number</label>
                                                        <div class="progress prog-bar-control my-2 " style="display:none; height: 5px;">
                                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%; ">
                                                            </div>
                                                        </div>
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
                                                        <input id="firstNoticeDate" class="form-control" type="date" name="firstNoticeDate" />
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
                                                        <input id="secondNoticeDate" class="form-control" type="date" name="secondNoticeDate" />
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
                                                        <input id="thirdNoticeDate" class="form-control" type="date" name="thirdNoticeDate" />
                                                        <label for="thirdNoticeDate">Date</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-floating mt-4">
                                                <textarea class="form-control" placeholder="Remarks" id="remarks" style="height: 100px" name="remarks"></textarea>
                                                <label for="remarks">Remarks</label>
                                                <p class="mt-3" id="dateLastUpdated" name="dateLastUpdated">Date last updated:</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="tab-pane" role="tabpanel" id="subQuarryTab" aria-labelledby="sub-quarry-tab">
                            <input type="checkbox" id="ApplicationLetter" name="requirement[]" value="Yes" required>
                            <label for="ApplicationLetter">1. Application Letter </label><br>

                            <label for="ApplicationfromNOT"><input type="checkbox" id="ApplicationfromNOT" name="requirement[]" value="Yes" required> 2. Application Form duly accomplished and Notarized and Permit Form</label><br>

                            <input type="checkbox" id="SurelyBond" name="SurelyBond" value="Yes" required>
                            <label for="SurelyBond">3. Surely Bond </label><br>

                            <label for="SketchedMap"> <input type="checkbox" id="SketchedMap" name="requirement[]" value="Yes" required> 4. Location map/sketch plan signed and sealed by Deputized Geodetic Engineer.</label><br>

                            <label for="PhotocopyRegistrationofEquipment"><input type="checkbox" id="PhotocopyRegistrationofEquipment" name="requirement[]" value="Yes" required> 5. Photocopy of Registration of Equipment or Least Contact </label><br>

                            <label for="Copyoregistriesaritclesofpartnership"><input type="checkbox" id="Copyoregistriesaritclesofpartnership" name="requirement[]" value="Yes" required> 6. Copy of Duly registered articles of partnership or corporations and by-laws in case of corporate </label><br>

                            <label for="CertcopyPowerofAttorney"><input type="checkbox" id="CertcopyPowerofAttorney" name="requirement[]" value="Yes" required> 7. Certfied copy of the registered Power of Attorney, If the application fled by an agent </label><br>

                            <input type="checkbox" id="ISAGApplication" name="requirement[]" value="Yes" required>
                            <label for="ISAGApplication">8. Processing Plant if ISAG application </label><br>

                            <label for="Proofofowenership"><input type="checkbox" id="Proofofowenership" name="requirement[]" value="Yes" required> 9. Proof of Owernetship(TCT or OCT) Contract of Lease if the said area is being rented for Quarry </label><br>

                            <input type="checkbox" id="CertificationAreaClearance" name="requirement[]e" value="Yes" required>
                            <label for="CertificationAreaClearance">10. Certification/Area Clearance: </label><br>

                            <label for="DPWH"><input type="checkbox" id="DPWH" name="requirement[]" value="Yes" required> 10.1. DPWH </label><br>

                            <label for="PEO"> <input type="checkbox" id="PEO" name="requirement[]" value="Yes" required> 10.2. PEO </label><br>

                            <label for="NIA"><input type="checkbox" id="NIA" name="requirement[]" value="Yes" required> 10.3. NIA </label><br>

                            <label for="DENR"><input type="checkbox" id="DENR" name="requirement[]" value="Yes" required> 10.4. DENR </label><br>

                            <label for="BarangayResolutionInterposingNoObjection"><input type="checkbox" id="BarangayResolutionInterposingNoObjection" name="requirement[]" value="Yes" required> 10.5. Barangay Resolution Interposing No Objection</label><br>

                            <label for="SBResolutionInterposingNoObjection"><input type="checkbox" id="SBResolutionInterposingNoObjection" name="requirement[]" value="Yes" required> 10.6. SB Resolution Interposing No Objection</label><br>

                            <label for="InspectionPenro"> <input type="checkbox" id="InspectionPenro" name="requirement[]" value="InspectionPenro" required> 10.7. Inspection/Verification report from PENRO</label><br>

                            <label for="TransmittalLetter"><input type="checkbox" id="TransmittalLetter" name="requirement[]" value="Yes" required> 11. Transmittal letter addressed to DENR - EMB Regional Director </label><br>

                            <label for="NotarizedChecklis"><input type="checkbox" id="NotarizedChecklis" name="requirement[]" value="Yes" required> 12. Notarazied Checklist/IEE with Accoutability of Statement/Resource Sustainability Geohazard (RSGA)</label><br>

                            <input type="checkbox" id="EnvironmentalCompliance" name="requirement[]" value="Yes" required>
                            <label for="EnvironmentalCompliance">13. Environmental Compliance Certificate (ECC)</label><br>

                            <label for="ProofsEvidencesregisteredwithagencies"><input type="checkbox" id="ProofsEvidencesregisteredwithagencies" name="requirement[]" value="Yes" required> 14. Proofs/Evidences (if the application is a partnership/cooperative/corporation showing that and/or duly registered with appropriate agencies)</label><br>

                            <input type="checkbox" id="BusinessPermit" name="requirement[]" value="Yes" required>
                            <label for="BusinessPermit">15. Business Permit (Renewal) </label><br>

                            <input type="checkbox" id="NoticeofPostingCertification" name="requirement[]" value="Yes" required>
                            <label for="NoticeofPostingCertification">16. Notice of Posting/Certification </label><br>

                            <label for="CSAGCEFP"><input type="checkbox" id="CSAGCEFP" name="requirement[]" value="Yes" required> 17. 1 Year Work Program (CSAG/CEFP)/5 year Work Program (ISAG/Quarry) </label><br>

                            <input type="checkbox" id="Seedlings" name="Seedlings" value="requirement[]" required>
                            <label for="Seedlings">18. Seedlings(Forest Trees or High Value Crops) </label><br>

                            <input type="checkbox" id="Payments" name="Payments" value="requirement[]" required>
                            <label for="Payments"> 19. Payments </label><br>
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
                                    @switch($quarry->municipality)
                                        @case(1)
                                        <td class="cell">COMPOSTELLA</td>
                                            @break
                                        
                                        @case(2)
                                        <td class="cell">LAAK</td>
                                            @break

                                        @case(3)
                                        <td class="cell">MABINI</td>
                                            @break
                                            
                                        @case4)
                                        <td class="cell">MACO</td>
                                            @break

                                        @case(5)
                                        <td class="cell">MARAGUSAN</td>
                                            @break

                                        @case(6)
                                        <td class="cell">MAWAB</td>
                                            @break

                                        @case(7)
                                        <td class="cell">MONKAYO</td>
                                            @break

                                        @case(8)
                                        <td class="cell">MONTEVISTA</td>
                                            @break

                                        @case(9)
                                        <td class="cell">NABUNTURAN</td>
                                            @break

                                        @case(10)
                                        <td class="cell">NEW BATAAN</td>
                                            @break

                                        @case(11)
                                        <td class="cell">PANTUKAN</td>
                                            @break

                                        @case(12)
                                        <td class="cell">NOT FROM DDO</td>
                                            @break
                                            
                                        @default
                                        <td class="cell">NO DATA</td>
                                    @endswitch
                                    
                                    <td class="cell">{{$quarry->date_applied}}</td>
                                    <td class="cell">{{$quarry->status}}</td>
                                    <td class="cell"><button id="editForm" class="btn-sm app-btn-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdropEdit" data-quarry-info="{{$quarry}}">Edit</button>
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
                                                    <input id="dateApplied" class="form-control" type="date" name="dateApplied" />
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
                                                        @foreach($municipalities as $municipality)
                                                        <option value="{{$municipality['id']}}" selected>{{$municipality->munname}}</option>
                                                        @endforeach
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
                                                    <input id="firstNoticeDate" class="form-control" type="date" name="firstNoticeDate" />
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
                                                    <input id="secondNoticeDate" class="form-control" type="date" name="secondNoticeDate" />
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
                                                    <input id="thirdNoticeDate" class="form-control" type="date" name="thirdNoticeDate" />
                                                    <label for="thirdNoticeDate">Date</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-floating mt-4">
                                            <textarea class="form-control" placeholder="Remarks" id="remarks" style="height: 100px" name="remarks"></textarea>
                                            <label for="remarks">Remarks</label>
                                        </div>

                                        <div class="row g-2 mt-3">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="dateLastUpdated" placeholder="Date Last Updated" name="dateLastUpdated" disabled>
                                                <label for="status">Date Last Updated</label>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/assets/js/quarry.js"></script>
    <script src="/assets/js/quarry-delete-edit.js"></script>
    <script src="/assets/js/quarry-toast.js"></script>
    <script src="/assets/js/quarry-control-number.js"></script>
    @endsection