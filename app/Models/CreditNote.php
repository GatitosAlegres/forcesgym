<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CreditNote extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $appends = ['artifact_url'];

    public function getArtifactUrlAttribute()
    {
        if (!is_null($this->artifact)) {
            return Storage::url($this->artifact);
        }

        return null;
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }
}
