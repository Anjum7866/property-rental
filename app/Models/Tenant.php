<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;
    protected $table = 'tenant_master'; 
    protected $fillable = [
        'TenantCode',
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
