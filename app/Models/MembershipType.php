<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembershipType extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_tipo_membresia',
        'precio',
    ];

    public function partners()
    {
        return $this->hasMany(Partner::class);
    }
}
