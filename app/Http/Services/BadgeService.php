<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\DB;

class BadgeService
{
    public function __construct()
    {
        //
    }

    public function obterRankingComNiveisDeBadges()
    {
        $sql = "select nomeDoUsuario, pontos, nomeDaBadge, pontuacao_nivel_classic,
                pontuacao_nivel_silver, pontuacao_nivel_gold, pontuacao_nivel_black
                from
                (select users.name as nomeDoUsuario, users_badges.points as pontos, badges.name as nomeDaBadge,
                badges.id as badgePontuadaID from users_badges
                inner join badges on badges.id = users_badges.badge_id
                inner join users on users.id = users_badges.user_id) as ranking,
                (select pontuacao_nivel_classic, pontuacao_nivel_silver, pontuacao_nivel_gold, pontuacao_nivel_black, id as badgeID
                from badges) as pontuacoesTable
                where badgePontuadaID = badgeID
                order by nomeDaBadge ASC, pontos DESC, nomeDoUsuario ASC;";

        $ranking = DB::SELECT($sql);

        return $ranking;
    }
}
