<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;


class OwnerController extends Controller
{

    public function index()
    {
        $owners = Owner::all();

        return response()->json($owners); // Return owners as JSON response
    }

    /**
     * Display a listing of the resource.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'OwnerCode' => 'required|unique:owner_master',
            'FirstName' => 'required',
            'LastName' => 'required',
            'MobileNo' => 'required',
            'EmailID' => 'required|unique:owner_master',
            'AddressL1' => 'required',
            'UserName' => 'required|unique:owner_master',
            'Password' => 'required',

        ]);

        $owner = Owner::create($validatedData);

        return response()->json($owner, 201);
    }

    public function show($id)
    {
        // Retrieve the owner by ID
        $owner = Owner::findOrFail($id);

        // Return the owner's information as JSON response
        return response()->json($owner, 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $owner = Owner::findOrFail($id);
       $validatedData = $request->validate([
            'FirstName' => 'required',
            'LastName' => 'required',
            'MobileNo' => 'required',
            'EmailID' => 'required|unique:owner_master,EmailID,'.$id,
            'AddressL1' => 'required',
            'UserName' => 'required|unique:owner_master,UserName,'.$id,
        ]);

        $owner->update($validatedData);
        return response()->json($owner, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
   public function destroy($id)
    {
        $owner = Owner::findOrFail($id);
        $owner->delete();
        return response()->noContent();
    }

}
