<?php

namespace App\Http\Controllers;

use App\Badge;
use App\Http\Services\BadgeService;
use App\Http\Middleware\Admin;
use App\Http\Requests\BadgeRequest;
use Illuminate\Support\Facades\Response;

class BadgeController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(Admin::class, ['except' => ['ranking', 'rankingCSV']]);

        $this->service = new BadgeService();
    }

    public function index()
    {
        $badges = Badge::all();

        return view('badge.index', ['badges' => $badges->all()]);
    }

    public function create()
    {
        return view('badge.create');
    }

    public function store(BadgeRequest $request)
    {
        Badge::create($request->all());

        return redirect('badges');
    }

    public function ranking()
    {
        $ranking = $this->service->obterRankingComNiveisDeBadges();

        return view('badge.ranking', ['registrosDoRanking' => $ranking]);
    }

    public function rankingCSV()
    {
        $tabela   = $this->service->obterRankingComNiveisDeBadges();
        $nomeDoArquivo = "ranking-begaming.csv";
        $handle   = fopen($nomeDoArquivo, 'w+');
        $cabecalho = "Funcionário;Badge;Pontuação Atual;Status Atual";
        fputcsv($handle, [$cabecalho]);

        foreach ($tabela as $linha) {

            $linha = json_decode(json_encode($linha), true);
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

            fputcsv($handle, array($linha['nomeDoUsuario'] . ";" . $linha['nomeDaBadge'] . ";" . $linha['pontos'] . ";" . $linha['pontuacao_status']));
        }

        fclose($handle);

        $headers = [
            'Content-Type' => 'text/csv',
        ];

        return Response::download($nomeDoArquivo, 'ranking.csv', $headers);
    }
}
