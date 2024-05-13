<?php
// app/Models/Warranty.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Warranty extends Model
{
    use HasFactory;

    public function devices()
    {
        return $this->hasMany(Device::class, 'client_id');
    }

    protected $fillable = ['name', 'email', 'phone', 'address']; // define fillable fields

    public $timestamps = true;
}
