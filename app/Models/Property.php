<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $table = 'property_master'; 
    protected $fillable = [
        'PropertyCode',
        'Type',
        'HouseNo',
        'FloorNo',
        'BuildingNo',
        'Society',
        'Road_Location',
        'AddressArea',
        'AddressCity',
        'AddressDistrict',
        'AddressState',
        'AddressPinCode',
        'IsRented',
        'MonthlyRent',
        'Deposit',
        'RentedVaccantFrom',
        'PropertyAddedOn',
        'IsActive',
    ];

}
