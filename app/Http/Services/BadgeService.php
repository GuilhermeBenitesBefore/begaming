<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\DB;

class BadgeService
{
    public function __construct()
    {
        //
    }

    //@TODO: Quando criar a migration com os niveis dos badges conforme issue #3, adicionar a coluna aqui e na view.
    public function obterRanking()
    {
        $ranking = DB::table('users_badges')
            ->join('badges', 'badges.id', '=', 'users_badges.badge_id')
            ->join('users', 'users.id', '=', 'users_badges.user_id')
            ->select('users.name AS nomeDoUsuario', 'users_badges.points AS pontos', 'badges.name AS nomeDaBadge')
            ->orderBy('badges.name', 'asc')
            ->orderBy('users_badges.points', 'desc')
            ->orderBy('users.name', 'asc')
            ->get();

        return $ranking;
    }
}
