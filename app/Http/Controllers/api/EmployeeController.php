<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Employee::all();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $req_data = $request->all();
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone_number' => 'required',
        ];
        $validator = Validator::make($req_data, $rules);
        if ($validator->fails()) {
            return response()->json(array('error' => true, 'validation_message' => $validator->errors()));
        }

        $data = new Employee;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone_number = $request->phone_number;
        $data->save();
        return response()->json(['error'=>false,'message'=>"Successfully saved"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        dd($id);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Employee::find($id);
        return response()->json(['key'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $req_data = $request->all();
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone_number' => 'required',
        ];
        $validator = Validator::make($req_data, $rules);
        if ($validator->fails()) {
            return response()->json(array('error' => true, 'validation_error' => true, 'validation_message' => $validator->errors()));
        }
        $data = Employee::find($id);
        $data->name = $request['name'];
        $data->email = $request['email'];
        $data->phone_number = $request['phone_number'];
        $data->password = $request['password'];
        $data->save();
        return response()->json('done');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Employee::find($id);
        if(!is_null($data)){
            $data->delete();
        }
        return response()->json(['message'=>'Deleted Successfully!']);
    }
}
