<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;

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
        $data = new Employee;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone_number = $request->contact_number;
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
    public function update(Request $request, string $id)
    {
        //
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
