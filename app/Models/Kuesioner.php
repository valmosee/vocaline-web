<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kuesioner extends Model
{
    protected $table= 'kuesioner';
    protected $fillable= [
        'id',
        'id_event',
        'pertanyaan',
        'choice_a',
        'choice_b',
        'choice_c',
        'choice_d'
    ];
    public $timestamps = false;
    public $incrementing = true;
}
