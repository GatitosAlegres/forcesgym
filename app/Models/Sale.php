<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class Sale extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = ['code', 'date', 'user_id', 'cliente_id', 'amount'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    protected $with = ['user'];

    protected static function boot()
    {
        parent::boot();



        static::creating(function ($sale) {
            $sale->user_id = Auth::id() ?: User::where('name', 'Admin')->first()->id; // Asigna el ID del usuario autenticado al campo user_id
            $sale->code = self::generateSaleCode($sale->code);
        });

        static::updating(function ($sale) {
            if ($sale->isDirty('code')) {
                $sale->code = self::generateSaleCode($sale->code);
            }
        });
    }

    public static function generateSaleCode($documentType)
    {
        $prefix = ($documentType == 'Boleta') ? 'B-2023' : 'F-2023';

        $latestCode = self::where('code', 'like', $prefix . '-%')->latest('id')->value('code');

        if (!$latestCode) {
            $codeNumber = 1;
        } else {
            $codeNumber = (int) substr($latestCode, -5) + 1;
        }

        $formattedCode = $prefix . '-' . str_pad($codeNumber, 5, '0', STR_PAD_LEFT);

        return $formattedCode;
    }


    public function saleDetails()
    {
        return $this->hasMany(SaleDetail::class);
    }

    public function customers()
    {
        return $this->belongsTo(Customer::class, 'cliente_id');
    }
}
