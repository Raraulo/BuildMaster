<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'stock', 'unidad_medida', 'project_id', 'costo_unitario'];

    public function project()
    {
        return $this->belongsTo(\App\Models\Project::class);
    }
}
