<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quarry;

use Session;

class QuarryController extends Controller
{
    function addData(Request $req){
        $data = new Quarry;
       
        $data->quarry_type=$req->quarryTypes;
        $data->control_number=$req->controlNum;
        $data->name=$req->name;
        $data->bus_name=$req->busName;
        $data->bus_address=$req->busAddress;
        $data->date_applied=$req->dateApplied;
        $data->contact_person=$req->contactPerson;
        $data->contact_num=$req->contactNum;
        $data->postal_address=$req->postalAddress;
        $data->municipality=$req->municipality;
        $data->status=$req->status;
        $data->first_notice=$req->firstNotice;
        $data->first_notice_date=$req->firstNoticeDate;
        $data->second_notice=$req->secondNotice;
        $data->second_notice_date=$req->secondNoticeDate;
        $data->third_notice=$req->thirdNotice;
        $data->third_notice_date=$req->thirdNoticeDate;
        $data->remarks=$req->remarks;
        $data->save();


       /* $subquarries - [
            'ApplicationLettersub' => $req -> ApplicationfromNOT,
            'ApplicationfromNOTsub' => $req -> ApplicationLetter,
           'SurelyBondsub' => $req -> SurelyBond,
           'SketchedMapsub' => $req -> SketchedMap,
           'PhotocopyRegistrationofEquipmentsub' => $req -> PhotocopyRegistrationofEquipment,
           'Copyoregistriesaritclesofpartnershipsub' => $req ->Copyoregistriesaritclesofpartnership,
           'CertcopyPowerofAttorneysub' =>$req ->CertcopyPowerofAttorney ,
           'ISAGApplicationsub' => $req -> ISAGApplication,
           'Proofofowenershipsub' => $req -> Proofofowenership,
           'CertificationAreaClearancesub' => $req -> CertificationAreaClearance,
           'DPWHsub' =>$req -> DPHW,
           'PEOsub' => $req -> PEO,
           'NIAsub' => $req -> NIA,
           'DENRsub' => $req -> DENR,
           'BarangayResolutionInterposingNoObjectionsub' =>$req -> BarangayResolutionInterposingNoObjection,
           'SBResolutionInterposingNoObjectionsub' => $req -> SBResolutionInterposingNoObjection,
           'InspectionPenrosub' => $req -> InspectionPenro,
           'TransmittalLettersub' => $req ->TransmittalLetter,
           'NotarizedChecklissub' => $req ->NotarizedChecklis,
           'EnvironmentalCompliancesub' => $req -> EnvironmentalCompliance,
           'ProofsEvidencesregisteredwithagenciessub' => $req -> ProofsEvidencesregisteredwithagencies,
           'BusinessPermitsub' => $req -> BusinessPermit,
           'NoticeofPostingCertificationsub' => $req -> NoticeofPostingCertification ,
           'CSAGCEFPsub' => $req -> CSAGCEFP,
           'Seedlingssub' => $req -> Seedlings,
           'Paymentssub' => $req -> Payments,
           

        ];
        

        Subquarry::table('subquarries')->insert($subquarries);
        */
        $req->session()->flash('name');
        return redirect('quarry');

    }

    function dataList(){
        $data = Quarry::all();
        return view('Quarry/quarry', ['quarries'=>$data]);
    }

    function deleteData($id){
        $data = Quarry::find($id);
        $data->delete();
        session()->flash('delete');
        return redirect('quarry');
    }

    function showData($id){
        $data = Quarry::find($id);
        return view('Quarry/quarry', ['data'=>$data]);
    }

    function updateData(Request $req, $id){
        
        $data = Quarry::find($req->id);
        $data->quarry_type=$req->quarryTypes;
        $data->name=$req->name;
        $data->bus_name=$req->busName;
        $data->bus_address=$req->busAddress;
        $data->date_applied=$req->dateApplied;
        $data->contact_person=$req->contactPerson;
        $data->contact_num=$req->contactNum;
        $data->postal_address=$req->postalAddress;
        $data->municipality=$req->municipality;
        $data->first_notice=$req->firstNotice;
        $data->first_notice_date=$req->firstNoticeDate;
        $data->second_notice=$req->secondNotice;
        $data->second_notice_date=$req->secondNoticeDate;
        $data->third_notice=$req->thirdNotice;
        $data->third_notice_date=$req->thirdNoticeDate;
        $data->remarks=$req->remarks;
        $data->save();
        
        return redirect('quarry');

    }



}
