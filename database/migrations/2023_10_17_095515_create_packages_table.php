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
        Schema::create('packages', function (Blueprint $table) {
            $table->unsignedBigInteger('id_guide');
            $table->unsignedBigInteger('id_province');
            $table->timestamp('added_on');
            // Add other columns as needed
            $table->string('description');
            $table->timestamps();
           
            $table->foreign('id_guide')->references('id')->on('users');   
            $table->foreign('id_province')->references('id')->on('provincias');   
            $table->primary([ 'added_on','id_province','id_guide', ]);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};