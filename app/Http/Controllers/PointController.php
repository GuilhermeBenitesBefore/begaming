<?php

namespace App\Http\Controllers;

use App\Badge;
use App\Http\Requests\PointRequest;
use App\Http\Services\PointService;
use App\Point;
use App\User;
use Illuminate\Support\Facades\Auth;

class PointController extends Controller
{

    private $service;

    public function __construct()
    {
        $this->middleware('auth');
        $this->service = new PointService();
    }

    public function index(){

        $points = Auth::user()->points()->get();

        return view('point.index', ['points' => $points]);
    }

    public function obterPontuacaoGeral()
    {
        $pontos = $this->service->obterPontuacoesDeTodosOsUsuarios();
        return view('point.geral', ['pontos' => $pontos]);
    }

    public function create(){

        $badges = Badge::all();
        $users = User::all()->sortBy('name');

        return view('point.create', ['badges' => $badges, 'users' => $users]);
    }

    public function store(PointRequest $request){
        Point::create($request->all());

        $user = User::find($request->get('user_id'));

        $badge = $user->badges()->where('badge_id', $request->get('badge_id'))->first();

        if($badge){
            $points = $badge->pivot->points + $request->get('point');

            $user->badges()->updateExistingPivot($request->get('badge_id'),['points' => $points]);
        }else{
            $badge = Badge::find($request->get('badge_id'));
            $user->badges()->save($badge,['points' => $request->get('point')]);
        }


        return redirect('/');
    }
}
