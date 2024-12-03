<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('clients', function (Blueprint $table) {
        $table->id(); // Make sure Client_ID is unique.
        $table->string('client_name')->unique();
        $table->string('Client_Company');
        $table->string('Client_email')->unique();
        $table->string('Client_ContactNo');
        $table->string('Client_TIN')->unique();
        $table->text('address');
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
        Schema::dropIfExists('clients'); // Drops the clients table
    }
}
