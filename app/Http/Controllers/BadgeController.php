<?php

namespace App\Http\Controllers;

use App\Badge;
use App\Http\Services\BadgeService;
use App\Http\Middleware\Admin;
use App\Http\Requests\BadgeRequest;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

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

    public function ranking(): View
    {
        $ranking           = $this->service->obterRankingComNiveisDeBadges();
        $nomeUsuarioLogado = Auth::user()->name;

        return view('badge.ranking', ['registrosDoRanking' => $ranking, 'nomeUsuarioLogado' => $nomeUsuarioLogado]);
    }

    public function rankingCSV(): BinaryFileResponse
    {
        $arquivo = $this->service->geraRankingCSV();
        $headers = [
            'Content-Type' => 'text/csv',
        ];

        return Response::download($arquivo, 'ranking-begaming.csv', $headers);
    }
}
