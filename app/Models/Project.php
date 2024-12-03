<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_id',
        'project_name',
        'address',
        'project_status',
    ];

    /**
     * Define the relationship with the Client model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    /**
     * Define the relationship with the Invoice model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function invoice()
    {
        return $this->hasMany(Invoice::class, 'id', 'invoice_id');
    }
}
