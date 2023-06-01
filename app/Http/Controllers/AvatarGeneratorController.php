<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AvatarGeneratorController extends Controller
{
    public function avatargenerator (Request $request)

    {
        return view('avatargenerator');
    }
}
