<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contacto extends Model
{
    protected $fillable = [
        'nome',
        'alcunha',
        'telemovel',
        'email',
        'localidade_id',
        'observacoes',
    ];

    public function localidade(): BelongsTo
    {
        return $this->belongsTo(Localidade::class);
    }
}
