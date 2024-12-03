<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    // Specify the table if it's not following the default naming convention
    protected $table = 'clients';

    // Allow mass assignment for these fields
    protected $fillable = [
        'client_name', 'Client_Company', 'Client_email',
        'Client_ContactNo', 'Client_TIN', 'address'
    ];

    public function payments()
{
    return $this->hasMany(Payment::class, 'client_id'); // Adjust foreign key if needed
}

}