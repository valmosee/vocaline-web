<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table= 'event';
    protected $fillable= [
        'name',
        'date',
        'location',
        'address',
        'city',
        'jam_mulai',
        'jam_selesai',
        'contact_person',
        'image',
        'total_penyanyi',
        'keterangan',
        'status'
    ];
}
