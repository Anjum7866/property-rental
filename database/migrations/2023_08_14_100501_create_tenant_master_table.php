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
        Schema::create('tenant_master', function (Blueprint $table) {
            $table->id();
            $table->string('TenantCode')->unique();
            $table->string('FirstName');
            $table->string('MiddleName')->nullable();
            $table->string('LastName');
            $table->string('MobileNo');
            $table->string('ContactNo')->nullable();
            $table->string('EmailID')->unique();
            $table->string('EmailIDCC')->nullable();
            $table->string('AddressL1');
            $table->string('AddressL2')->nullable();
            $table->string('AddressArea')->nullable();
            $table->string('AddressCity')->nullable();
            $table->string('AddressDistrict')->nullable();
            $table->string('AddressState')->nullable();
            $table->string('AddressPinCode')->nullable();
            $table->string('PANCardID')->nullable();
            $table->string('PANCardImage')->nullable();
            $table->string('AadharID')->nullable();
            $table->string('AadharImage')->nullable();
            $table->boolean('IsActive')->default(true);
            $table->unsignedInteger('RatingStar')->default(0);
            $table->string('UserName')->unique();
            $table->string('Password');
            $table->timestamp('PasswordLast')->nullable();
            $table->string('PasswordHintQue')->nullable();
            $table->string('PasswordHintAns')->nullable();
            $table->timestamp('PasswordChangedOn')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenant_master');
    }
};
