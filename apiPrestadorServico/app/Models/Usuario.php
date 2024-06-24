<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Model{
    use HasFactory;
    protected $table = 'usuarios';

    protected $fillable = [
        'email',
        'senha', // Certifique-se de que 'senha' corresponde ao campo na tabela 'usuarios'
    ];

    protected $hidden = [
        'senha',
    ];

}
