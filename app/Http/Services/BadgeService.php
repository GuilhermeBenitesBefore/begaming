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

    public function geraRankingCSV(): string
    {
        $tabela        = $this->obterRankingComNiveisDeBadges();
        $nomeDoArquivo = "ranking-begaming.csv";
        $handle        = fopen($nomeDoArquivo, 'w+');
        $cabecalho     = "Funcionário;Badge;Pontuação Atual;Status Atual";

        fputcsv($handle, [$cabecalho]);

        foreach ($tabela as $linha) {
            $linha                     = json_decode(json_encode($linha), true);
            $linha['pontuacao_status'] = 'Não Elegível';

            if ($linha['pontos'] >= $linha['pontuacao_nivel_classic']) {
                $linha['pontuacao_status'] = 'Classic';
            }
            if ($linha['pontos'] >= $linha['pontuacao_nivel_silver']) {
                $linha['pontuacao_status'] = 'Silver';
            }
            if ($linha['pontos'] >= $linha['pontuacao_nivel_gold']) {
                $linha['pontuacao_status'] = 'Gold';
            }
            if ($linha['pontos'] >= $linha['pontuacao_nivel_black']) {
                $linha['pontuacao_status'] = 'Black';
            }

            fputcsv($handle,
                    [$linha['nomeDoUsuario'] . ";" . $linha['nomeDaBadge'] . ";" . $linha['pontos'] . ";" . $linha['pontuacao_status']]);
        }

        fclose($handle);

        return $nomeDoArquivo;
    }
}
