<?php

namespace App\Http\Controllers;

use App\Badge;
use App\Http\Middleware\Admin;
use App\Http\Requests\BadgeRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(Admin::class);
    }

    public function index(){
        $users = User::all();

        return view('user.index', ['users' => $users->all()]);
    }

    public function create(){
        return view('user.create');
    }

    public function store(BadgeRequest $request){

        $user = new User();
        $user->fill($request->all());
        $user->password = Hash::make('teste1212');

        $user->save();

        return redirect('users');
    }
}
