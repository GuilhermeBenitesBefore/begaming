<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    const ADMIRACAO = 1;
    const BEM_ESTAR = 2;
    const CURSOS_PALESTRAS = 3;
    const PALESTRAR = 4;
    const DESEMPENHO_META = 5;
    const TEMPO_EMPRESA = 6;
    const COMPETICOES_INTERNAS = 7;
    const CULTURA = 8;
    const ATITUDE_EXTRAORDINARIA = 9;

    protected $fillable = ['name'];
}
