<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicos extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function especialidades()
    {
        return $this->belongsToMany(
            Especialidades::class,
            'medicos_especialidades',
            'medicos_id',
            'especialidades_id',
        );
    }
}
