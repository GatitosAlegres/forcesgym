<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Events\EmployeeHired;
use App\Events\EmployeeFired;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = ['interview_id'];

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

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }

    public function interview()
    {
        return $this->belongsTo(Interview::class);
    }

    public function clase_entrenamiento()
    {
        // Verifica que la clave foránea 'clases_entrenamiento_id' sea la correcta
        return $this->hasOne(TrainingClass::class, 'clase_entrenamiento_id');
    }
}
