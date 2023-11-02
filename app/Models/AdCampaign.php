<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdCampaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nombre_campana',
        'fecha_inicio',
        'fecha_fin',
        'descripcion',
        'estado',
    ];

    // Define the relationship with the user model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship with the presupuesto_campana model
    public function presupuesto_campana()
    {
        return $this->hasOne(CampaignBudget::class);
    }
}
