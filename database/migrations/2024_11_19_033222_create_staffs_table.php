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
        Schema::create('staffs', function (Blueprint $table) {
            $table->id('staff_id');
            $table->string('fullname', 200);
            $table->string('gender', 20);
            $table->date('dob');
            $table->string('phone_number', 20);
            $table->string('address', 100);
            $table->string('avatar', 100);
            $table->bigInteger('salary');
            $table->unsignedBigInteger('account_id');
            $table->foreign('account_id')
                ->references('account_id')
                ->on('accounts')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staffs');
    }
};
