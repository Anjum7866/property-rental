<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Property;


class PropertyMasterCrudTest extends TestCase
{
    use RefreshDatabase;
    protected $property;

    protected function setUp(): void
    {
        parent::setUp();

        // Create an property record for reuse in test cases
        $this->property = Property::create([
            'PropertyCode' => 'PPT123',
            'Type' => 'Flat',
            'HouseNo' => '11',
            'FloorNo' => '2',
            'BuildingNo' => '5',
            'Society' => 'John Residential Society',
            'Road_Location' => 'sasanenagar',
            'AddressArea' => 'hadapsar',
            'AddressCity' => 'pune',
            'AddressDistrict'=> 'pune',
            'AddressState'=> 'maharashtra',
            'AddressPinCode'=> '413716',
            'MonthlyRent'=> '5000',
            'Deposit'=> '25000',
        ]);
    }


    public function testCreateProperty()
{
    $propertyData = [
        'PropertyCode' => 'PPT12',
        'Type' => 'Flat',
        'HouseNo' => '112',
        'FloorNo' => '2',
        'BuildingNo' => '5',
        'Society' => 'John Residential Society',
        'Road_Location' => 'sasanenagar',
        'AddressArea' => 'hadapsar',
        'AddressCity' => 'pune',
        'AddressDistrict'=> 'pune',
        'AddressState'=> 'maharashtra',
        'AddressPinCode'=> '413716',
        'MonthlyRent'=> '5000',
        'Deposit'=> '25000',
    ];


    // Use the $this->property data to create a new property
    $response = $this->postJson(route('properties.store'), $propertyData);

    $response->assertStatus(201);
    $this->assertDatabaseHas('property_master', ['PropertyCode' => 'PPT12']);
}


    public function testReadProperty()
    {
        $this->property ;

        $response = $this->getJson(route('properties.show', ['property' =>$this->property->id]));
        $response->assertStatus(200);

        $response->assertJson([
            'id' => $this->property->id,
            'PropertyCode' => $this->property->PropertyCode,
            'Type' => $this->property->Type,
            'HouseNo' => $this->property->HouseNo,
            'FloorNo' => $this->property->FloorNo,
            'BuildingNo' => $this->property->BuildingNo,
            'Society' => $this->property->Society,
            'Road_Location' => $this->property->Road_Location,
            'AddressArea' => $this->property->AddressArea,
            'AddressCity' => $this->property->AddressCity,
            'AddressDistrict' => $this->property->AddressDistrict,
            'AddressState' => $this->property->AddressState,
            'AddressPinCode' => $this->property->AddressPinCode,
            'MonthlyRent' => $this->property->MonthlyRent,
            'Deposit' => $this->property->Deposit,
            ]);
     }

    public function testUpdateProperty()
    {
        $this->property ;


        $updatedData = [
            'Type' => 'Flat',
            'HouseNo' => '112',
            'FloorNo' => '2',
            'BuildingNo' => '5',
            'Society' => 'John Residential Society',
            'Road_Location' => 'sasanenagar',
            'AddressArea' => 'hadapsar',
            'AddressCity' => 'pune',
            'AddressDistrict'=> 'pune',
            'AddressState'=> 'maharashtra',
            'AddressPinCode'=> '413716',
            'MonthlyRent'=> '5000',
            'Deposit'=> '25000',
        ];

        $response = $this->putJson(route('properties.update', ['property' =>$this->property->id]), $updatedData);

        $response->assertStatus(200);
        $this->assertDatabaseHas('property_master', ['Type' => 'Flat','HouseNo' => '112', 'FloorNo' => '2','BuildingNo' => '5',
        'Society' => 'John Residential Society','Road_Location' => 'sasanenagar','AddressArea' => 'hadapsar','AddressCity' => 'pune','AddressDistrict'=> 'pune','AddressState'=> 'maharashtra',
        'AddressPinCode'=> '413716','MonthlyRent'=> '5000',  'Deposit'=> '25000',]);
    }

    public function testDeleteProperty()
    {
        $response = $this->delete(route('properties.destroy', ['property' => $this->property->id]));
        $response->assertStatus(204);
        $this->assertDatabaseMissing('property_master', ['id' => $this->property->id]);
    }
    
}
