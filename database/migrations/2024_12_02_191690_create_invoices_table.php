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
            $table->id(); // Auto-incrementing primary key
            $table->foreignId('client_id')->constrained('clients')->onDelete('cascade'); // Foreign key to the clients table
            $table->foreignId('project_id')->nullable()->constrained('projects')->onDelete('cascade'); // Foreign key to the projects table
            $table->string('invoice_number')->unique(); // Unique invoice number
            $table->date('invoice_date'); // Date of the invoice
            $table->date('due_date'); // Due date for the invoice
            $table->decimal('total_amount', 15, 2); // Total amount (precision: 15, scale: 2)
            $table->text('description')->nullable(); // Optional description or notes
            $table->enum('status', ['draft', 'issued', 'paid', 'overdue'])->default('draft'); // Invoice status
            $table->timestamps(); // Created at and Updated at
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
