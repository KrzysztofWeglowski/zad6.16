<?php
// app/Models/Service.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory;


    protected $table = 'services';
    protected $fillable = ['name', 'description', 'price','img']; // define fillable fields

    public $timestamps = true;
}
