<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Columnas que se pueden llenar masivamente
    protected $fillable = [
        'name',
        'email',
        'password',
        'skills', // <-- agregamos para permitir asignación masiva
    ];

    // Columnas ocultas
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Casts automáticos
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'skills' => 'array', // <-- convierte skills JSON <-> array
    ];
}
