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

    function lastID(Request $req)
    {   
        $var = 'SELECT control_number AS id FROM quarries WHERE quarry_type = "'.$req->type.'" ORDER BY id DESC LIMIT 1';
        $id = DB::select($var);
        $id = count($id) != 0  ? $id[0]->id : $req->type.'-000';
        $x = explode("-", $id);// [CSAG, 099]
        $id = (int)$x[1];//99
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
        
        $req->session()->flash('name', 'Data added successfully!');
        return redirect('quarry');
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


    function updateData(Request $req, $id)
    {

        $data = Quarry::find($req->id);
        $data->quarry_type = $req->quarryTypes;
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

        return redirect('quarry');
    }

    // SUBQUARRY


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quarry');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input['requirements'] = $request->input('requirements');
        Subquarry::create($input);
        return redirect()->route('quarry');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
