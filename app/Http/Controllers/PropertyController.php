<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property; 

class PropertyController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'PropertyCode' => 'required|unique:property_master',
            'Type' => 'required',
            'HouseNo' => 'required',
            'FloorNo' => 'required',
            'BuildingNo' => 'required',
            'Society' => 'required',
            'Road_Location' => 'required',
            'AddressArea' => 'required',
            'AddressCity' => 'required',
            'AddressDistrict' => 'required',
            'AddressState' => 'required',
            'AddressPinCode' => 'required',
            'MonthlyRent' => 'required',
            'Deposit' => 'required',
        ]);

        $property = Property::create($validatedData);

        return response()->json($property, 201);
    }

    public function show($id)
    {
        // Retrieve the property by ID
        $property = Property::findOrFail($id);

        // Return the property's information as JSON response
        return response()->json($property, 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $property = Property::findOrFail($id);
       $validatedData = $request->validate([
            'Type' => 'required',
            'HouseNo' => 'required',
            'FloorNo' => 'required',
            'BuildingNo' => 'required',
            'Society' => 'required',
            'Road_Location' => 'required',
            'AddressArea' => 'required',
            'AddressCity' => 'required',
            'AddressDistrict' => 'required',
            'AddressState' => 'required',
            'AddressPinCode' => 'required',
            'MonthlyRent' => 'required',
            'Deposit' => 'required',
        ]);

        $property->update($validatedData);
        return response()->json($property, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
   public function destroy($id)
    {
        $property = Property::findOrFail($id);
        $property->delete();
        return response()->noContent();
    }
}
