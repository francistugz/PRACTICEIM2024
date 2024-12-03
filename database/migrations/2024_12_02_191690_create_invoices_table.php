<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('client_id'); // Foreign key to clients table
            $table->unsignedBigInteger('project_id')->nullable(); // Optional link to a project
            $table->string('invoice_number')->unique(); // Unique invoice identifier
            $table->decimal('total_amount', 15, 2); // Total amount
            $table->date('due_date'); // Due date
            $table->enum('status', ['pending', 'paid', 'overdue'])->default('pending'); // Status
            $table->text('notes')->nullable(); // Notes
            $table->timestamps(); // Timestamps
        
            // Foreign Key Constraints
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
