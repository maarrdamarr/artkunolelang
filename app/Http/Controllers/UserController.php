<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class UserController extends Controller
{
    public function dashboard(): View
    {
        return view('roles.user.dashboard');
    }

    public function browse(): View
    {
        return view('roles.user.browse');
    }

    public function bidHistory(): View
    {
        return view('roles.user.bid-history');
    }

    public function watchlist(): View
    {
        return view('roles.user.watchlist');
    }

    public function itemDetail($id): View
    {
        return view('roles.user.item-detail', ['id' => $id]);
    }
}
