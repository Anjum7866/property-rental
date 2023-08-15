<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('property_master', function (Blueprint $table) {
            $table->id();
            $table->string('PropertyCode')->unique();
            $table->string('Type');
            $table->string('HouseNo');
            $table->string('FloorNo');
            $table->string('BuildingNo');
            $table->string('Society');
            $table->string('Road_Location');
            $table->string('AddressArea');
            $table->string('AddressCity');
            $table->string('AddressDistrict');
            $table->string('AddressState');
            $table->string('AddressPinCode');
            $table->boolean('IsRented')->default(false);
            $table->decimal('MonthlyRent', 10, 2)->nullable();
            $table->decimal('Deposit', 10, 2)->nullable();
            $table->date('RentedVaccantFrom')->nullable();
            $table->timestamp('PropertyAddedOn')->useCurrent();
            $table->boolean('IsActive')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_master');
    }
};
