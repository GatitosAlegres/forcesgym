<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RemisionGuide extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];
    protected $appends = ['artifact_url'];

    public function getArtifactUrlAttribute()
    {
        if (!is_null($this->artifact)) {
            return Storage::url($this->artifact);
        }

        return null;
    }

    public function compra()
    {
        return $this->hasOne(Purchase::class);
    }
}
