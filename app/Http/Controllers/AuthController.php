<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\{Auth, URl};

class AuthController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }
    
    public function login(AuthRequest $req)
    {
        $user =  $req->only(['email', 'password']);
        if (Auth::guard()->attempt($user)) {
            return to_route('admin.home');
        }
    }

    public function logout(Request $req)
    {
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        return to_route('auth.index');
    }
}
