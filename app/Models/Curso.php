<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Curso extends Model
{
    use HasFactory;

    protected $fillable = [


        'name',
        'type', 
        
        /* otros atributos fillable */
    
    
    
    ];



    public function estudiante(): BelongsTo
    {
        return $this->belongsTo(Estudiante::class);
    }
 

    

}
