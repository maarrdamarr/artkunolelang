<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

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
        $users = User::orderBy('created_at', 'desc')->paginate(10);
        return view('roles.admin.kelola-user', compact('users'));
    }

    public function kelolaLelang(): View
    {
        $items = Item::with('user')->orderBy('created_at', 'desc')->paginate(10);
        return view('roles.admin.kelola-lelang', compact('items'));
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

    // User Management Functions
    public function createUserForm(): View
    {
        return view('roles.admin.users.create');
    }

    public function createUser(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin,penjual,user',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('admin.kelola-user')->with('success', 'User created successfully.');
    }

    public function editUserForm($id): View
    {
        $user = User::findOrFail($id);
        return view('roles.admin.users.edit', compact('user'));
    }

    public function updateUser(Request $request, $id): RedirectResponse
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'role' => 'required|in:admin,penjual,user',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        if ($request->password) {
            $request->validate([
                'password' => 'string|min:8|confirmed',
            ]);
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('admin.kelola-user')->with('success', 'User updated successfully.');
    }

    public function deleteUser($id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.kelola-user')->with('success', 'User deleted successfully.');
    }

    // Auction Management Functions
    public function createAuctionForm(): View
    {
        $users = User::where('role', 'penjual')->get();
        return view('roles.admin.auctions.create', compact('users'));
    }

    public function createAuction(Request $request): RedirectResponse
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'description' => 'required|string',
            'start_price' => 'required|numeric|min:0',
            'status' => 'required|in:pending,active,rejected,completed',
        ]);

        Item::create([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'category' => $request->category,
            'description' => $request->description,
            'start_price' => $request->start_price,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.kelola-lelang')->with('success', 'Auction created successfully.');
    }

    public function editAuctionForm($id): View
    {
        $item = Item::findOrFail($id);
        $users = User::where('role', 'penjual')->get();
        return view('roles.admin.auctions.edit', compact('item', 'users'));
    }

    public function updateAuction(Request $request, $id): RedirectResponse
    {
        $item = Item::findOrFail($id);

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'description' => 'required|string',
            'start_price' => 'required|numeric|min:0',
            'status' => 'required|in:pending,active,rejected,completed',
        ]);

        $item->user_id = $request->user_id;
        $item->name = $request->name;
        $item->category = $request->category;
        $item->description = $request->description;
        $item->start_price = $request->start_price;
        $item->status = $request->status;
        $item->save();

        return redirect()->route('admin.kelola-lelang')->with('success', 'Auction updated successfully.');
    }

    public function deleteAuction($id): RedirectResponse
    {
        $item = Item::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.kelola-lelang')->with('success', 'Auction deleted successfully.');
    }
}