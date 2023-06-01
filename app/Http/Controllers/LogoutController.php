<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout()
    {
        Auth::logout(); // Melakukan logout
        return redirect()->route('login.index'); // Redirect ke halaman login (sesuai dengan route yang telah Anda definisikan)
    }
}
