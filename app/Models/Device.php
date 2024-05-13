<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Device extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'brand',
        'model',
        'serial_number',
        'warranty_expiry_date',
        'warranty_provider',
        'warranty_claim_number',
         // Add this
    ];
    public function repairs()
    {
        return $this->hasMany(Repair::class);
    }
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
