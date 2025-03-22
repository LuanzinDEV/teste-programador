<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidatoModel extends Model {
    use HasFactory;

    protected $table = 'candidatos';

    protected $fillable = [
        'nome',
        'email',
        'telefone',
    ];

    public function inscricoes() {
        return $this->hasMany(Inscricao::class);
    }

    public function vagas() {
        return $this->belongsToMany(Vaga::class, 'inscricoes');
    }
}


