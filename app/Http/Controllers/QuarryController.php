<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quarry;
use App\Models\Municipality;
use App\Models\Subquarry;
use Session;
use Illuminate\Support\Facades\DB;


class QuarryController extends Controller
{
    function selectUser(Request $req)
    {
        return response()->json(array('user_info' =>Quarry::find($req->id)), 200);
    }

    function lastID(Request $req)
    {   
        $var = 'SELECT control_number AS id FROM quarries WHERE quarry_type = "'.$req->type.'" ORDER BY id DESC LIMIT 1';
        $id = DB::select($var);
        $id = count($id) != 0  ? $id[0]->id : $req->type.'-000';
        $x = explode("-", $id);// [CSAG, 099]
        $id = (int)$x[1]; //99
        return response()->json(array('last_insert_id' =>$id), 200);
    }
    
    function addData(Request $req)
    {

        $input = $req->only('requirement');
        $input['requirements'] = json_encode($input); //$req->input('requirement');
        $idFromSubQuarry = Subquarry::create($input)->id;

        $data = new Quarry;
        $data->quarry_type = $req->quarryTypes;
        $data->control_number = $req->controlNum;
        $data->subquarry_id = $idFromSubQuarry; // id from subquarry
        $data->name = $req->name;
        $data->bus_name = $req->busName;
        $data->bus_address = $req->busAddress;
        $data->date_applied = $req->dateApplied;
        $data->contact_person = $req->contactPerson;
        $data->contact_num = $req->contactNum;
        $data->postal_address = $req->postalAddress;
        $data->municipality = $req->municipality;
        $data->status = $req->status;
        $data->first_notice = $req->firstNotice;
        $data->first_notice_date = $req->firstNoticeDate;
        $data->second_notice = $req->secondNotice;
        $data->second_notice_date = $req->secondNoticeDate;
        $data->third_notice = $req->thirdNotice;
        $data->third_notice_date = $req->thirdNoticeDate;
        $data->remarks = $req->remarks;
        $data->save();
      
        
        return response()->json(array('last_inserted' =>$data), 200);
    }

    function dataList()
    {
        $data = Quarry::all();
        $mun = Municipality::all();
        return view('Quarry/quarry', ['quarries' => $data, 'municipalities' => $mun]);
    }

    function deleteData($id)
    {
        $data = Quarry::find($id);
        Subquarry::find($data->subquarry_id)->delete();
        $data->delete();
        return true;
    }

    function showData($id)
    {
        $data = Quarry::find($id);
        return view('Quarry/quarry', ['data' => $data]);
    }


    function updateData(Request $req)
    {

        $data = Quarry::find($req->updateId);
        $data->quarry_type = $req->quarryTypes;
        $data->control_number = $req->controlNum;
        $data->name = $req->name;
        $data->bus_name = $req->busName;
        $data->bus_address = $req->busAddress;
        $data->date_applied = $req->dateApplied;
        $data->contact_person = $req->contactPerson;
        $data->contact_num = $req->contactNum;
        $data->postal_address = $req->postalAddress;
        $data->municipality = $req->municipality;
        $data->first_notice = $req->firstNotice;
        $data->first_notice_date = $req->firstNoticeDate;
        $data->second_notice = $req->secondNotice;
        $data->second_notice_date = $req->secondNoticeDate;
        $data->third_notice = $req->thirdNotice;
        $data->third_notice_date = $req->thirdNoticeDate;
        $data->remarks = $req->remarks;
        $data->save();
        return response()->json(array('last_updated' =>$data), 200);

        //return redirect('quarry');
    }
}
