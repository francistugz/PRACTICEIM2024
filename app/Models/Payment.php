<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'invoices_id',
        'payment_method',
        'amount',
        'payment_date',
        'reference_number',
        'notes',
    ];

    /**
     * Define the relationship to the Invoice model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'invoices_id');
    }

    public function client()
{
    return $this->belongsTo(Client::class);
}

}
