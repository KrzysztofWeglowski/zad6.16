<?php

// app/Models/EwidencjaRepair.php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Repair extends Model
{
    protected $table = 'repairs';
    protected $fillable = [
        'device_id',
        'description',
        'repair_date', // Fix typo
        'repair_cost', // Fix typo
    ];
    public function device()
    {
        return $this->belongsTo(Device::class);
    }
    public function owns(Repair $repair): bool
    {
        return $this->id === $repair->client->user_id;
    }
}

