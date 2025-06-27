<?php

namespace App\Models;

use App\Http\Controllers\KuesionerController;
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

    public function kuesioner() {
    return $this->hasMany(Kuesioner::class, 'id_event');

}
}
