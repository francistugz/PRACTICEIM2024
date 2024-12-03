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
            'client_id' => ['required', 'exists:clients,id'],
            'project_id' => ['required', 'exists:projects,id'],
            'invoice_number' => 'required|unique:invoices,invoice_number',
            'total_amount' => 'required|numeric',
            'due_date' => 'required|date',
            'status' => 'required|in:pending,paid,overdue',
            'notes' => 'nullable|string',
        ]);

        $invoice = new Invoice([
            'client_id' => $validated['client_id'], // Ensure this is set
            'project_id' => $validated['project_id'],
            'invoice_number' => $validated['invoice_number'],
            'total_amount' => $validated['total_amount'],
            'due_date' => $validated['due_date'],
            'status' => $validated['status'],
            'notes' => $validated['notes'],
        ]);
    
        $invoice->save();

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
            'due_date' => 'required|date',
            'status' => 'required|in:pending,paid,overdue',
            'notes' => 'nullable|string',
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
