<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;

    protected $fillable = [
        'aluno_id',
        'turma_id',
        'disciplina',
        'periodo',
        'prova1',
        'prova2',
        'trabalho',
        'media',
    ];

    protected $casts = [
        'prova1'   => 'float',
        'prova2'   => 'float',
        'trabalho' => 'float',
        'media'    => 'float',
    ];

    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }

    public function turma()
    {
        return $this->belongsTo(Turma::class);
    }

    protected static function booted(): void
    {
        static::saving(function (Nota $nota) {
            $nota->media = round(($nota->prova1 + $nota->prova2 + $nota->trabalho) / 3, 1);
        });
    }
}