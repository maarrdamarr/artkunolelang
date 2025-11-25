<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PenjualController extends Controller
{
    public function dashboard(): View
    {
        return view('roles.penjual.dashboard');
    }
}
