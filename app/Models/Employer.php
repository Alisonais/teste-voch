<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    /** @use HasFactory<\Database\Factories\EmployerFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */

    protected $fillable = [
        'name',
        'email',
        'cpf'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<string>
     */

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

}
