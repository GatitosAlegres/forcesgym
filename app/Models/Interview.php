<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function evaluation()
    {
        return $this->belongsTo(Evaluation::class);
    }

    public function employee()
    {
        return $this->hasOne(Employee::class);
    }

    public function candidate()
    {
        return $this->belongsTo(Candidate::class, 'evaluation_id'); 
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function ($interview) {

            if ($interview->state==true) {
                $candidate = $interview->candidate;

                // Crear un nuevo Employee con los datos del candidato
                $employee = new Employee([
                    'vacancy_id' => $candidate->vacancy_id,
                    'journey_id' => $candidate->journey_id,
                    'day_id' => $candidate->day_id,
                    'gender_id' => $candidate->gender_id,
                    'contract_duration_id' => $candidate->contract_duration_id,
                    'dni' => $candidate->dni,
                    'firstname' => $candidate->firstname,
                    'lastname' => $candidate->lastname,
                    'email' => $candidate->email,
                    'phone' => $candidate->phone,
                    'address' => $candidate->address,
                    'date_start' => now(), // Puedes personalizar la fecha de inicio
                    'salary' => 1025, // Personaliza el salario si es necesario
                ]);
                $employee->save();
                // Asociar la entrevista al empleado

                $interview->employee()->save($employee);
            }

            static::updated(function ($interview) {
                if ($interview->isDirty('state') && $interview->state === false) {
                    $interview->employee()->delete();
                }

                if ($interview->isDirty('state') && $interview->state === true) {
                    $candidate = $interview->candidate;
                    
                    $employee = new Employee([
                        'vacancy_id' => $candidate->vacancy_id,
                        'journey_id' => $candidate->journey_id,
                        'day_id' => $candidate->day_id,
                        'gender_id' => $candidate->gender_id,
                        'contract_duration_id' => $candidate->contract_duration_id,
                        'dni' => $candidate->dni,
                        'firstname' => $candidate->firstname,
                        'lastname' => $candidate->lastname,
                        'email' => $candidate->email,
                        'phone' => $candidate->phone,
                        'address' => $candidate->address,
                        'payroll' => 0,
                        'fee' => 0,
                    ]);
                    $employee->save();
                    // Asociar la entrevista al empleado
    
                    $interview->employee()->save($employee);
                }
            });
        });
    }
}
