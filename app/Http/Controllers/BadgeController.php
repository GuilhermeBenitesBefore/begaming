<?php

namespace App\Http\Controllers;

use App\Badge;
use App\Http\Middleware\Admin;
use App\Http\Requests\BadgeRequest;

class BadgeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(Admin::class);
    }

    public function index(){
        $badges = Badge::all();

        return view('badge.index', ['badges' => $badges->all()]);
    }

    public function create(){
        return view('badge.create');
    }

    public function store(BadgeRequest $request){
        Badge::create($request->all());

        return redirect('badges');
    }
}
