<?php

namespace App\Models;

use App\Models\Skill;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hero extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'image',
        'gender',
        'race',
        'description',
        'skill_id'
    ];

    // // je charge automatiquement l'utilisateur à chaque fois que je récupère un message
    // // EAGER LOADING automatique
    protected $with = ['skill'];

   // nom de la fonction au singulier car 1 seul user en relation
    // cardinalité 1,1
    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }

}
