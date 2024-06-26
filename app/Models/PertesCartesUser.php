<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PertesCartesUser extends Model
{
    use HasFactory;

    public function demandeur():BelongsTo {
        return $this->belongsTo(Demandeur::class);
    }
}
