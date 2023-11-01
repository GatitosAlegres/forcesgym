<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function candidate()
    {
        return $this->hasOne(Candidate::class);
    }

    public function evaluationDetails()
    {
        return $this->hasMany(EvaluationDetail::class);
    }

    public function getLinkAttribute($value)
    {
        return $value ?? 'Entrevista presencial';
    }

    protected static function boot()
    {
        parent::boot();
    
        static::creating(function ($evaluation) {
            $lastDigit = static::orderBy('code', 'desc')->first();
    
            if (!$lastDigit) {
                $evaluation->code = 'E-0001';
            } else {
                $ultimoNumero = intval(substr($lastDigit->code, 2));
                $newNumber = $ultimoNumero + 1;
                $evaluation->code = 'E-' . str_pad($newNumber, 4, '0', STR_PAD_LEFT);
            }
        });
    }

}
