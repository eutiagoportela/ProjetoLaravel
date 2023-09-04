<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidades extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function medicos()
    {
        return $this->belongsToMany(
            Medicos::class,
            'medicos_especialidades',
            'especialidades_id',
            'medicos_id',
        );
    }
}
