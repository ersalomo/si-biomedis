<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth};

class AdminProfileController extends Controller
{
    public function profile(Request $req)
    {
        $data_user = Auth::user();
        return view('author.content.profile.profile-me', [
            'data_user' => $data_user,
        ]);
    }
}
