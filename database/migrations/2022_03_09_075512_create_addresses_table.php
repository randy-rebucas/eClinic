<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('line_1'); // The first line of an address.
            $table->string('line_2'); // An optional second line of an address.
            $table->string('district'); // The region of an address, this may be a state, province, prefecture, etc.
            $table->string('city'); // A foreign key pointing to the city table.
            $table->string('country');
            $table->char('postal_code'); // The postal code or ZIP code of the address (where applicable).
            $table->string('phone'); // The telephone number for the address.
            $table->text('location'); //A Geometry column with a spatial index on it.
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
        Schema::dropIfExists('addresses');
    }
}
