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
        Schema::create('customers', function (Blueprint $table) {
            $table->id('customer_id');
            $table->string('fullname', 100);
            $table->string('gender', 10);
            $table->date('dob');
            $table->string('phone_number', 20)->nullable();
            $table->string('address', 100)->nullable();
            $table->string('avatar', 50)->nullable();
            //account_id
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
    }
};
