<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayrollDetail extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function payroll() {
        return $this->belongsTo(Payroll::class);
    }
}
