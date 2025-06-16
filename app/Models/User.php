<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    const ROLE_ADMIN = 'admin';
    const ROLE_PESERTA = 'peserta';
    const ROLE_EVENTHOLDER = 'eventholder';
    public $incrementing = true;
    protected $table = 'users';
    protected $fillable = [
        'nama',
        'nrp',
        'angkatan',
        'jurusan',
        'email',
        'password',
        'jeniskelamin',
        'no_hp',
        'id_line',
        'role',
        'foto', // Pastikan ini tidak dikomentari
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}