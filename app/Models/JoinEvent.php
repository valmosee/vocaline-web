<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JoinEvent extends Model
{
    public function event() {
    return $this->belongsTo(Event::class, 'id_event');
}
    public function user() {
    return $this->belongsTo(User::class, 'id_user');
}
    public function jawaban() {
    return $this->hasMany(Jawaban::class, 'id_join');
}

protected $fillable = ['id_event', 'id_user', 'tanggal', 'status'];
protected $table = 'join_event';
    public $timestamps = false;
}
