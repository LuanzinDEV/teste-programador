<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VagaModel extends Model {
    use HasFactory;

    protected $table = 'vagas';

    protected $fillable = [
        'titulo',
        'descricao',
        'tipo',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function inscricoes() {
        return $this->hasMany(Inscricao::class);
    }

    public function candidatos() {
        return $this->belongsToMany(Candidato::class, 'inscricoes');
    }
}
