@extends('layouts.app')

@section('content')
<div class="container-xl">

    <!-- Button trigger modal -->
    <button type="button" class="btn app-btn-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Add
    </button>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Quarry</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">

            <div class="row g-2">
                <div class="col-6">
                    <div class="card border-start-0 border-top-0 border-bottom-0 rounded-0 ">
                        <div class="card-body px-4">

                            <div class="row g-3 mb-3 align-items-center justify-content-between">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input id ="floatingDate" class="form-control" type="date" />
                                        <label for="floatingDate">Date Applied</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                            <option value="1">CSAG</option>
                                            <option value="2">CE</option>
                                            <option value="3">ISAG</option>
                                        </select>
                                        <label for="floatingSelect">Quarry Types</label>
                                    </div>
                                </div>
                            </div>
    
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingPassword" placeholder="Control No.">
                                        <label for="floatingPassword">Control Number</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md">
                                    <div class="form-floating mt-3">
                                        <input type="text" class="form-control" id="floatingInput" placeholder="Name">
                                        <label for="floatingInput">Name</label>
                                    </div>
                                </div>
                            </div>


                            <div class="row g-2 mt-2">
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingPassword" placeholder="Bus Name">
                                        <label for="floatingPassword">Bus Name</label>
                                    </div>
                                </div>
                                
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingPassword" placeholder="Bus Address">
                                        <label for="floatingPassword">Bus Address</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-2 mt-2">
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingPassword" placeholder="Contact Person">
                                        <label for="floatingPassword">Contact Person</label>
                                    </div>
                                </div>
                            
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingPassword" placeholder="Contact Number">
                                        <label for="floatingPassword">Contact Number</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-2 mt-2">
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingPassword" placeholder="Postal Address">
                                        <label for="floatingPassword">Postal Address</label>
                                    </div>
                                </div>

                                <div class="col-md">
                                    <div class="form-floating">
                                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                        <label for="floatingSelect">Municipality</label>
                                    </div>
                                </div>

                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingPassword" placeholder="Status">
                                        <label for="floatingPassword">Status</label>
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
                                        <input type="text" class="form-control" id="firstNotice" placeholder="First Notice">
                                        <label for="firstNotice">First Notice</label>
                                    </div>
                                </div>
                                
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input id ="datePicker" class="form-control" type="date" />
                                        <label for="datePicker">Date</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-2 mt-0">
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="secondNotice" placeholder="First Notice">
                                        <label for="secondNotice">Second Notice</label>
                                    </div>
                                </div>
                                
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input id ="datePicker" class="form-control" type="date" />
                                        <label for="datePicker">Date</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-2 mt-0">
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="ThirdNotice" placeholder="First Notice">
                                        <label for="ThirdNotice">Third Notice</label>
                                    </div>
                                </div>
                                
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input id ="datePicker" class="form-control" type="date" />
                                        <label for="datePicker">Date</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-floating mt-4">
                                <textarea class="form-control" placeholder="Remarks" id="floatingTextarea2" style="height: 100px"></textarea>
                                <label for="floatingTextarea2">Remarks</label>
                                <p class="mt-3">Date last updated:</p>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- DIRIA IMONG UI DREW -->



            </div>

        </div>

        <form action="/action_page.php">
            <input type="checkbox" id="ApplicationLetter" name="ApplicationLetter" value="Bike">
            <label for="ApplicationLetter">1. Application Letter </label><br>
            <input type="checkbox" id="ApplicationfromNOT" name="ApplicationfromNOT" value="Car">
            <label for="ApplicationfromNOT">2. Application Form duly accomplished and Notarized and Permit Form</label><br>
            <input type="checkbox" id="SurelyBond" name="SurelyBond" value="SurelyBond">
            <label for="SurelyBond">3. Surely Bond </label><br>
            <input type="checkbox" id="SkectchedMap" name="SkectchedMap" value="SkectchedMap">
            <label for="SkectchedMap">4. Location map/sketch plan signed and sealed by Deputized Geodetic Engineer.</label><br>
            <input type="checkbox" id="PhotocopyRegistrationofEquipment" name="PhotocopyRegistrationofEquipment" value="PhotocopyRegistrationofEquipment">
            <label for="PhotocopyRegistrationofEquipment">5. Photocopy of Registration of Equipment or Least Contact </label><br>
            <input type="checkbox" id="Copyoregistriesaritclesofpartnership" name="Copyoregistriesaritclesofpartnership" value="Copyoregistriesaritclesofpartnership">
            <label for="Copyoregistriesaritclesofpartnership">6. Copy of Duly registered articles of partnership or corporations and by-laws in case of corporate </label><br><br>
            <input type="checkbox" id="CertcopyPowerofAttorney" name="CertcopyPowerofAttorney" value="CertcopyPowerofAttorney">
            <label for="CertcopyPowerofAttorney">7. Certfied copy of the registered Power of Attorney, If the application fled by an agent </label><br>
            <input type="checkbox" id="ISAGApplication" name="ISAGApplication" value="ISAGApplication">
            <label for="ISAGApplication">8. Processing Plant if ISAG application </label><br>
            <input type="checkbox" id="Proofofowenership" name="Proofofowenership" value="Proofofowenership">
            <label for="Proofofowenership">9. Proof of Owernetship(TCT or OCT) Contract of Lease if the said area is being rented for Quarry </label><br>
            <input type="checkbox" id="CertificationAreaClearance:" name="CertificationAreaClearance:" value="CertificationAreaClearance:">
            <label for="CertificationAreaClearance:">10. Certification/Area Clearance:</label><br>
            <input type="checkbox" id="TransmittalLetter" name="TransmittalLetter" value="TransmittalLetter">
            <label for="TransmittalLetter">11. Transmittal letter addressed to DENR - EMB Regional Director </label><br>
            <input type="checkbox" id="NotarizedChecklis" name="NotarizedChecklis" value="NotarizedChecklis">
            <label for="NotarizedChecklis">12. Notarazied Checklist/IEE with Accoutability of Statement/Resource Sustainability Geohazard (RSGA)</label><br>
            <input type="checkbox" id="EnvironmentalCompliance" name="EnvironmentalCompliance" value="EnvironmentalCompliance">
            <label for="EnvironmentalCompliance">13. Environmental Compliance Certificate (ECC)</label><br>
            <input type="checkbox" id="ProofsEvidencesregisteredwithagencies" name="ProofsEvidencesregisteredwithagencies" value="ProofsEvidencesregisteredwithagencies">
            <label for="ProofsEvidencesregisteredwithagencies">14. Proofs/Evidences (if the application is a partnership/cooperative/corporation showing that and/or duly registered with appropriate agencies) </label><br>
            <input type="checkbox" id="BusinessPermit" name="BusinessPermit" value="BusinessPermit">
            <label for="BusinessPermit">15. Business Permit (Renewal) </label><br>
            <input type="checkbox" id="NoticeofPostingCertification" name="NoticeofPostingCertification" value="NoticeofPostingCertification">
            <label for="NoticeofPostingCertification">16. Notice of Posting/Certification </label><br>
            <input type="checkbox" id="CSAGCEFP" name="CSAGCEFP" value="CSAGCEFP">
            <label for="CSAGCEFP">17. 1 Year Work Program (CSAG/CEFP)/5 year Work Program (ISAG/Quarry) </label><br>
            <input type="checkbox" id="Seedlings" name="Seedlings" value="Seedlings">
            <label for="Seedlings">18. Seedlings(Forest Trees or High Value Crops) </label><br>
            <input type="checkbox" id="Payemnts" name="Payemnts" value="Payemnts">
            <label for="Payemnts"> Payments </label><br>
            
       
            
            
            <input type="submit" value="Submit">
          </form>

        <div class="modal-footer">
            <button type="button" class="btn btn-primary text-white">Submit</button>
        </div>
        

    </div>
    </div>
    </div>

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
                                    <th class="cell">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td class="cell">00000</td>
                                        <td class="cell">Dummy</td>
                                        <td class="cell"><a href="#"><button class="btn-sm app-btn-secondary">Edit</button></a>
                                        <button class="btn-sm app-btn-secondary" type="submit">Delete</button>
                                        </td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <!-- <nav class="app-pagination">
                {{--  {!! $conveyances->links() !!}  --}}
            </nav>//app-pagination -->

        </div>
    </div>
    
    

    
    
    
    

</div>
@endsection