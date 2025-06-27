<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    public function joinEvent() {
    return $this->belongsTo(JoinEvent::class, 'id_join');
}

    public function kuesioner() {
        return $this->belongsTo(Kuesioner::class, 'id_kuesioner');
    }

    protected $fillable = ['id_join', 'id_kuesioner', 'jawaban', 'tanggal'];
    public $timestamps = false;
    protected $table = 'jawaban';
}
