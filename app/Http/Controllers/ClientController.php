<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function index()
{
    // Get all clients, paginated (if needed)
    $clients = Client::paginate(10); // Adjust the number of items per page
    return view('clients.index', compact('clients'));
}

public function create()
    {
        return view('clients.create'); // Return the view where the client creation form is located
    }

    public function store(Request $request)
    {
        try {
            // Validate the incoming request
            $validated = $request->validate([
                'client_name' => 'required|string|max:255|unique:clients,client_name',
                'Client_Company' => 'required|string|max:255',
                'Client_email' => 'required|email|unique:clients,Client_email',
                'Client_ContactNo' => 'required|string',
                'Client_TIN' => 'required|string|unique:clients,Client_TIN',
                'address' => 'required|string',
            ]);
    
            // Create the new client
            Client::create($validated);
    
            // Redirect back with a success message
            return redirect()->route('clients.index')->with('success', 'Client created successfully!');
        } catch (QueryException $e) {
            // If there is a database error (like unique constraint violation)
            return redirect()->back()->withErrors(['client_name' => 'Client already exists.'])->withInput();
        }
    }

    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }
    
    


// Update the client in the database
public function update(Request $request, $id)
{
    // Validate the incoming request
    $validated = $request->validate([
        'client_name' => 'required|string|max:255|unique:clients,client_name,' . $id,
        'Client_Company' => 'required|string|max:255',
        'Client_email' => 'required|email|unique:clients,Client_email,' . $id,
        'Client_ContactNo' => 'required|string',
        'Client_TIN' => 'required|string|unique:clients,Client_TIN,' . $id,
        'address' => 'required|string',
    ]);

    // Find the client by ID and update the record
    $client = Client::findOrFail($id);
    $client->update($validated);

    // Redirect back with a success message
    return redirect()->route('clients.index')->with('success', 'Client updated successfully!');
}

public function destroy(Client $client)
{
    try {
        $client->delete();
        return redirect()->route('clients.index')->with('success', 'Client deleted successfully!');
    } catch (\Exception $e) {
        return redirect()->route('clients.index')->with('error', 'Error deleting client: ' . $e->getMessage());
    }
}

public function showPayments($id)
{
    // Find the client by ID
    $client = Client::findOrFail($id);

    // Fetch payments related to the client (assuming you have a relationship)
    $payments = $client->payments; // Adjust if using a custom query or eager loading

    // Return a view with client and payments data
    return view('clients.payments', compact('client', 'payments'));
}


}
