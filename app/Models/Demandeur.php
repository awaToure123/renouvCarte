<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Demandeur extends Model
{
    use HasFactory;


    public function demande_carte():HasMany{
        return $this->hasMany(Demande_carte::class);
    }

    public function renouvellement_carte():HasMany {
        return $this->hasMany(Renouvellement_carte::class);
    }

    public function PertesCartesUser():HasMany {
        return $this->hasMany(PertesCartesUser::class);
    }
}
