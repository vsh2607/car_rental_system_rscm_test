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
        Schema::create('rents', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('rent_rentdate');
            $table->date('rent_returndate');
            $table->date('rent_realreturndate')->nullable();
            $table->bigInteger('pelanggan_id');
            $table->bigInteger('car_id');
            $table->bigInteger('rent_total_price');
            $table->integer('is_returned')->default(0);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rents');
    }
};
