<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PenjualController extends Controller
{
    public function dashboard(): View
    {
        return view('roles.penjual.dashboard');
    }

    public function addItem(): View
    {
        return view('roles.penjual.add-item');
    }

    public function manageItems(): View
    {
        return view('roles.penjual.manage-items');
    }

    public function salesReport(): View
    {
        return view('roles.penjual.sales-report');
    }

    public function itemDetail($id): View
    {
        return view('roles.penjual.item-detail', ['id' => $id]);
    }
}
