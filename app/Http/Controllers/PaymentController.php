<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Invoice;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the payments.
     */
    public function index()
    {
        $payments = Payment::with('invoice')->get(); // Eager load invoice relationship
        return view('payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new payment.
     */
    public function create()
    {
        $invoices = Invoice::all(); // Fetch invoices for the dropdown
        return view('payments.create', compact('invoices'));
    }

    /**
     * Store a newly created payment in the database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'invoices_id' => 'required|exists:invoices,id',
            'payment_method' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'payment_date' => 'required|date',
            'reference_number' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
        ]);

        Payment::create($validated);

        return redirect()->route('payments.index')->with('success', 'Payment recorded successfully!');
    }

    /**
     * Show the form for editing a payment.
     */
    public function edit(Payment $payment)
    {
        $invoices = Invoice::all(); // Fetch invoices for the dropdown
        return view('payments.edit', compact('payment', 'invoices'));
    }

    /**
     * Update the specified payment in the database.
     */
    public function update(Request $request, Payment $payment)
    {
        $validated = $request->validate([
            'invoices_id' => 'required|exists:invoices,id',
            'payment_method' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'payment_date' => 'required|date',
            'reference_number' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
        ]);

        $payment->update($validated);

        return redirect()->route('payments.index')->with('success', 'Payment updated successfully!');
    }

    /**
     * Remove the specified payment from the database.
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();

        return redirect()->route('payments.index')->with('success', 'Payment deleted successfully!');
    }
}
