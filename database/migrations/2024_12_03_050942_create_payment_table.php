<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('invoices_id'); // Foreign key to invoices table
            $table->string('payment_method');
            $table->decimal('amount', 15, 2);
            $table->date('payment_date');
            $table->string('reference_number');
            $table->text('notes')->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('invoices_id')->references('id')->on('invoices')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
