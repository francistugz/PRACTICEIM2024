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
        $invoices = Invoice::with(['client', 'project'])->orderBy('created_at', 'desc')->get(); // Eager load and order by creation date
        return view('invoices.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new invoice.
     */
    public function create()
    {
        $clients = Client::orderBy('client_name')->get(); // Order clients alphabetically
        $projects = Project::orderBy('project_name')->get(); // Order projects alphabetically
        return view('invoices.create', compact('clients', 'projects'));
    }

    /**
     * Store a newly created invoice in the database.
     */
    public function store(Request $request)
{
    // Validation rules
    $validated = $request->validate([
        'client_id' => 'required|exists:clients,id',
        'project_id' => 'nullable|exists:projects,id',
        'invoice_number' => 'required|string|max:255|unique:invoices,invoice_number',
        'invoice_date' => 'required|date|before_or_equal:today',
        'due_date' => 'required|date|after_or_equal:invoice_date',
        'total_amount' => 'required|numeric|min:0',
        'description' => 'nullable|string|max:1000',
        'status' => 'required|in:draft,issued,paid,overdue',
    ], [
        'due_date.after_or_equal' => 'The due date must be on or after the invoice date.',
    ]);

    // Create the invoice
    Invoice::create([
        'client_id' => $validated['client_id'],
        'project_id' => $validated['project_id'] ?? null,
        'invoice_number' => $validated['invoice_number'],
        'invoice_date' => $validated['invoice_date'],
        'due_date' => $validated['due_date'],
        'total_amount' => $validated['total_amount'],
        'description' => $validated['description'] ?? null,
        'status' => $validated['status'],
    ]);

    // Redirect with success message
    return redirect()->route('invoices.index')->with('success', 'Invoice created successfully!');
}

    /**
     * Show the form for editing an invoice.
     */
    public function edit(Invoice $invoice)
    {
        $clients = Client::orderBy('client_name')->get();
        $projects = Project::orderBy('project_name')->get();
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
            'invoice_date' => 'required|date|before_or_equal:today',
            'due_date' => 'required|date|after_or_equal:invoice_date',
            'total_amount' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:1000',
            'status' => 'required|in:draft,issued,paid,overdue',
        ], [
            'due_date.after_or_equal' => 'The due date must be on or after the invoice date.',
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
