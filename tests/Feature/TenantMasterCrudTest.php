<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Tenant;


class TenantMasterCrudTest extends TestCase
{
    use RefreshDatabase;
    protected $tenant;

    protected function setUp(): void
    {
        parent::setUp();

        // Create an tenant record for reuse in test cases
        $this->tenant = Tenant::create([
            'TenantCode' => 'TNT123',
            'FirstName' => 'John',
            'LastName' => 'Deo',
            'MobileNo' => '12222222',
            'EmailID' => 'john1@example.com',
            'AddressL1' => 'John Residential',
            'UserName' => 'john',
            'Password' => 'password',
        ]);
    }


    public function testCreateTenant()
{
    $tenantData = [
        'TenantCode' => 'TNT12',
        'FirstName' => 'Johno',
        'LastName' => 'Deoo',
        'MobileNo' => '122222226',
        'EmailID' => 'johno1@example.com',
        'AddressL1' => 'Johno Residential',
        'UserName' => 'johno',
        'Password' => 'password',
    ];


    // Use the $this->tenant data to create a new tenant
    $response = $this->postJson(route('tenants.store'), $tenantData);

    $response->assertStatus(201);
    $this->assertDatabaseHas('tenant_master', ['TenantCode' => 'TNT12']);
}


    public function testReadTenant()
    {
        $this->tenant ;

        $response = $this->getJson(route('tenants.show', ['tenant' =>$this->tenant->id]));
        $response->assertStatus(200);

        $response->assertJson([
            'id' => $this->tenant->id,
            'TenantCode' => $this->tenant->TenantCode,
            'FirstName' => $this->tenant->FirstName,
            'LastName' => $this->tenant->LastName,
            'MobileNo'=>$this->tenant->MobileNo,
            'EmailID' => $this->tenant->EmailID,
            'AddressL1' => $this->tenant->AddressL1,
            'UserName'=>$this->tenant->UserName,
            'Password'=>$this->tenant->Password,
        ]);
     }

    public function testUpdateTenant()
    {
        $this->tenant ;


        $updatedData = [
            'FirstName' => 'Johny',
            'LastName' => 'Dass',
            'MobileNo' => '12222288',
            'EmailID' => 'johny@example.com',
            'AddressL1' => 'Johny Residential',
            'UserName' => 'johny',
        ];

        $response = $this->putJson(route('tenants.update', ['tenant' =>$this->tenant->id]), $updatedData);

        $response->assertStatus(200);
        $this->assertDatabaseHas('tenant_master', ['FirstName' => 'Johny','LastName' => 'Dass','MobileNo' => '12222288',
        'EmailID' => 'johny@example.com', 'AddressL1' => 'Johny Residential','UserName' => 'johny',]);
    }

    public function testDeleteTenant()
    {
        $response = $this->delete(route('tenants.destroy', ['tenant' => $this->tenant->id]));
        $response->assertStatus(204);
        $this->assertDatabaseMissing('tenant_master', ['id' => $this->tenant->id]);
    }
    
}
