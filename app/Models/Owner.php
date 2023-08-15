<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;
    protected $table = 'owner_master'; 
    protected $fillable = [
        'OwnerCode',
        'FirstName',
        'MiddleName',
        'LastName',
        'MobileNo',
        'ContactNo',
        'EmailID',
        'EmailIDCC',
        'AddressL1',
        'AddressL2',
        'AddressArea',
        'AddressCity',
        'AddressDistrict',
        'AddressState',
        'AddressPinCode',
        'PANCardID',
        'PANCardImage',
        'AadharID',
        'AadharImage',
        'IsActive',
        'RatingStar',
        'UserName',
        'Password',
        'PasswordLast',
        'PasswordHintQue',
        'PasswordHintAns',
        'PasswordChangedOn'

     ];

}
