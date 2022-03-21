<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('logo')->nullable();
            $table->string('name');
            $table->foreignId('address_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->char('prc');
            $table->char('prt')->nullable();
            $table->char('s2')->nullable();
            $table->json('operations');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clinics');
    }
}
