<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant; 

class TenantController extends Controller
{
    public function index()
    {
        $tenants = Tenant::all();

        return response()->json($tenants); // Return tenants as JSON response
    }

   /**
     * Display a listing of the resource.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'TenantCode' => 'required|unique:tenant_master',
            'FirstName' => 'required',
            'LastName' => 'required',
            'MobileNo' => 'required',
            'EmailID' => 'required|unique:tenant_master',
            'AddressL1' => 'required',
            'UserName' => 'required|unique:tenant_master',
            'Password' => 'required',

        ]);

        $tenant = Tenant::create($validatedData);

        return response()->json($tenant, 201);
    }

    public function show($id)
    {
        // Retrieve the tenant by ID
        $tenant = Tenant::findOrFail($id);

        // Return the tenant's information as JSON response
        return response()->json($tenant, 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $tenant = Tenant::findOrFail($id);
       $validatedData = $request->validate([
            'FirstName' => 'required',
            'LastName' => 'required',
            'MobileNo' => 'required',
            'EmailID' => 'required|unique:tenant_master,EmailID,'.$id,
            'AddressL1' => 'required',
            'UserName' => 'required|unique:tenant_master,UserName,'.$id,
        ]);

        $tenant->update($validatedData);
        return response()->json($tenant, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
   public function destroy($id)
    {
        $tenant = Tenant::findOrFail($id);
        $tenant->delete();
        return response()->noContent();
    }
}
