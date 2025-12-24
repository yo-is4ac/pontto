<?php

namespace App\Models;

use App\Casts\NumericOnlyCast;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employee';

    protected $fillable = [
        'company_id',
        'name',
        'cpf',
        'phone',
        'email',
        'role',
        'password'
    ];

    protected $casts = [
        'cpf' => NumericOnlyCast::class,
        'phone' => NumericOnlyCast::class
    ];
}
