<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Client;
use App\Models\Project;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the invoices.
     */
    public function index()
    {
        $invoices = Invoice::with(['client', 'project'])->get(); // Eager load client and project for efficiency
        return view('invoices.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new invoice.
     */
    public function create()
    {
        $clients = Client::all(); // Fetch clients for dropdown
        $projects = Project::all(); // Fetch projects for dropdown (optional)
        return view('invoices.create', compact('clients', 'projects'));
    }

    /**
     * Store a newly created invoice in the database.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'client_id' => 'required|exists:clients,id',
        'project_id' => 'required|exists:projects,id',
        'invoice_number' => 'required|string|max:255|unique:invoices,invoice_number',
        'total_amount' => 'required|numeric|min:0',
        'due_date' => 'required|date_format:Y-m-d|after_or_equal:today',
        'status' => 'required|in:pending,paid,overdue',
        'notes' => 'nullable|string',
    ], [
        'due_date.required' => 'The due date is required.',
        'due_date.date_format' => 'The due date must be in the format YYYY-MM-DD.',
        'due_date.after_or_equal' => 'The due date cannot be in the past.',
    ]);

    // Save the validated data
    Invoice::create($validated);

    return redirect()->route('invoices.index')->with('success', 'Invoice created successfully!');
}


    /**
     * Show the form for editing an invoice.
     */
    public function edit(Invoice $invoice)
    {
        $clients = Client::all();
        $projects = Project::all();
        return view('invoices.edit', compact('invoice', 'clients', 'projects'));
    }

    /**
     * Update the specified invoice in the database.
     */
    public function update(Request $request, Invoice $invoice)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'project_id' => 'nullable|exists:projects,id',
            'invoice_number' => 'required|string|max:255|unique:invoices,invoice_number,' . $invoice->id,
            'total_amount' => 'required|numeric|min:0',
            'due_date' => 'required|date|after_or_equal:today',  // Ensures a valid date and that it is not in the past
            'status' => 'required|in:pending,paid,overdue',
            'notes' => 'nullable|string',
        ], [
            'due_date.date' => 'The due date must be a valid date in the format YYYY-MM-DD.',
            'due_date.after_or_equal' => 'The due date cannot be in the past.',
        ]);

        $invoice->update($validated);

        return redirect()->route('invoices.index')->with('success', 'Invoice updated successfully!');
    }

    /**
     * Remove the specified invoice from the database.
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();

        return redirect()->route('invoices.index')->with('success', 'Invoice deleted successfully!');
    }
}
