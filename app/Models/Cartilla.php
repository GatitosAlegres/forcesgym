<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cartilla extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function asesoramiento()
    {
        return $this->belongsTo(Asesoramiento::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
