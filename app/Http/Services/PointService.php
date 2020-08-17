<?php
namespace App\Http\Services;

use Illuminate\Support\Facades\DB;

class PointService
{
    public function __construct()
    {
        //
    }

    public function obterPontuacoesDeTodosOsUsuarios()
    {
        #TODO: fazer essa pesquisa
        $sql = "select * from points;";

        $ranking = DB::SELECT($sql);

        return $ranking;
    }
}
