<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Estudiante extends Model
{
   


    public function cursos(): HasMany
    {
        return $this->hasMany(Curso::class);
    }

            
    use HasFactory;

    protected $fillable = ['name','email','date_of_birth','phone',  /* otros atributos fillable */];

    
    

}
