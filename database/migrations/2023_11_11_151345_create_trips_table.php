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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_guide');
            $table->unsignedBigInteger('id_tourist');
            $table->unsignedBigInteger('id_package');
            $table->date('date');
            $table->string('is_accepted')->default('pendente');
          
            $table->float('price');
            //number of people
            $table->integer('number_people');
            //foreigns keys down here
            $table->foreign('id_guide')->references('id')->on('users');
            $table->foreign('id_tourist')->references('id')->on('users');
            $table->foreign('id_package')->references('id')->on('packages');
            

            


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
