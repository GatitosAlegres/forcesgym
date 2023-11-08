<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function journey()
    {
        return $this->belongsTo(Journey::class);
    }

    public function day()
    {
        return $this->belongsTo(Day::class);
    }

    public function contractDuration()
    {
        return $this->belongsTo(ContractDuration::class);
    }

    public function employee()
    {
        return $this->hasOne(Employee::class);
    }         
}                               
