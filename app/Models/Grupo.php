<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Grupo extends Model
{


    protected $fillable = [
        'grupo',
    ];

    public function contactos():BelongsToMany
    {
        return $this->belongsToMany(Contacto::class);
    }

}
