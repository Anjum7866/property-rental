<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Owner;

class OwnerMasterCrudTest extends TestCase
{
    use RefreshDatabase;
    protected $owner;

    protected function setUp(): void
    {
        parent::setUp();

        // Create an owner record for reuse in test cases
        $this->owner = Owner::create([
            'OwnerCode' => 'OWN123',
            'FirstName' => 'John',
            'LastName' => 'Deo',
            'MobileNo' => '12222222',
            'EmailID' => 'john@example.com',
            'AddressL1' => 'John Residential',
            'UserName' => 'john',
            'Password' => 'password',
        ]);
    }


    public function testCreateOwner()
{
    $ownerData = [
        'OwnerCode' => 'OWN12',
        'FirstName' => 'Johno',
        'LastName' => 'Deoo',
        'MobileNo' => '122222226',
        'EmailID' => 'johno@example.com',
        'AddressL1' => 'Johno Residential',
        'UserName' => 'johno',
        'Password' => 'password',
    ];


    // Use the $this->owner data to create a new owner
    $response = $this->postJson(route('owners.store'), $ownerData);

    $response->assertStatus(201);
    $this->assertDatabaseHas('owner_master', ['OwnerCode' => 'OWN123']);
}


    public function testReadOwner()
    {
        $this->owner ;

        $response = $this->getJson(route('owners.show', ['owner' =>$this->owner->id]));
        $response->assertStatus(200);

        $response->assertJson([
            'id' => $this->owner->id,
            'OwnerCode' => $this->owner->OwnerCode,
            'FirstName' => $this->owner->FirstName,
            'LastName' => $this->owner->LastName,
            'MobileNo'=>$this->owner->MobileNo,
            'EmailID' => $this->owner->EmailID,
            'AddressL1' => $this->owner->AddressL1,
            'UserName'=>$this->owner->UserName,
            'Password'=>$this->owner->Password,
        ]);
     }

    public function testUpdateOwner()
    {
        $this->owner ;


        $updatedData = [
            'FirstName' => 'Johny',
            'LastName' => 'Dass',
            'MobileNo' => '12222288',
            'EmailID' => 'johny@example.com',
            'AddressL1' => 'Johny Residential',
            'UserName' => 'johny',
        ];

        $response = $this->putJson(route('owners.update', ['owner' =>$this->owner->id]), $updatedData);

        $response->assertStatus(200);
        $this->assertDatabaseHas('owner_master', ['FirstName' => 'Johny','LastName' => 'Dass','MobileNo' => '12222288',
        'EmailID' => 'johny@example.com', 'AddressL1' => 'Johny Residential','UserName' => 'johny',]);
    }

    public function testDeleteOwner()
    {
        $response = $this->delete(route('owners.destroy', ['owner' => $this->owner->id]));
        $response->assertStatus(204);
        $this->assertDatabaseMissing('owner_master', ['id' => $this->owner->id]);
    }
    
}
