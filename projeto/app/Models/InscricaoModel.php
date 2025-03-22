<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InscricaoModel extends Model {
    use HasFactory;

    protected $table = 'inscricoes';

    protected $fillable = [
        'candidato_id',
        'vaga_id',
    ];

    public function candidato() {
        return $this->belongsTo(Candidato::class);
    }

    public function vaga() {
        return $this->belongsTo(Vaga::class);
    }
}
