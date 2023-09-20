<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Curriculum extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function entrevista()
    {
        return $this->hasMany(Entrevista::class);
    }

    protected static function boot()
    {
        parent::boot();

        self::deleting(function ($curriculum) {
            $curriculum->entrevista()->delete();
        });
    }
}
