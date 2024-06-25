<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Demande_carte extends Model
{
    use HasFactory;


    public function demandeur():BelongsTo {
        return $this->belongsTo(Demandeur::class);
    }
}
