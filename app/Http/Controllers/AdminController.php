<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function dashboard(): View
    {
        return view('roles.admin.dashboard');
    }

    public function verifikasiBarang(): View
    {
        $items = Item::where('status', 'pending')->with('user')->orderBy('created_at', 'desc')->paginate(10);
        return view('roles.admin.verifikasi-barang', compact('items'));
    }

    public function kelolaUser(): View
    {
        return view('roles.admin.kelola-user');
    }

    public function kelolaLelang(): View
    {
        return view('roles.admin.kelola-lelang');
    }

    public function laporan(): View
    {
        return view('roles.admin.laporan');
    }

    public function approveItem(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        $item->status = 'active';
        $item->save();

        return redirect()->route('admin.verifikasi-barang')->with('success', 'Item approved successfully.');
    }

    public function rejectItem(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        $item->status = 'rejected';
        $item->save();

        return redirect()->route('admin.verifikasi-barang')->with('success', 'Item rejected.');
    }
}
