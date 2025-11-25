<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PaymentMethodController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $methods = Auth::user()->paymentMethods()->latest()->get();
        return view('roles.user.payment_methods.index', compact('methods'));
    }

    public function create()
    {
        return view('roles.user.payment_methods.form', ['method' => new PaymentMethod()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'type' => 'required|string',
            'label' => 'nullable|string|max:255',
            'details' => 'nullable|array',
            'image' => 'nullable|image|max:2048',
            'active' => 'sometimes|boolean',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('payment_methods', 'public');
            $data['image'] = $path;
        }

        $data['details'] = $data['details'] ?? null;
        $data['user_id'] = Auth::id();

        PaymentMethod::create($data);

        return redirect()->route('user.payment-methods.index')
            ->with('success', 'Payment method added.');
    }

    public function edit(PaymentMethod $paymentMethod)
    {
        if (Auth::id() !== $paymentMethod->user_id) {
            abort(403);
        }
        return view('roles.user.payment_methods.form', ['method' => $paymentMethod]);
    }

    public function update(Request $request, PaymentMethod $paymentMethod)
    {
        if (Auth::id() !== $paymentMethod->user_id) {
            abort(403);
        }

        $data = $request->validate([
            'type' => 'required|string',
            'label' => 'nullable|string|max:255',
            'details' => 'nullable|array',
            'image' => 'nullable|image|max:2048',
            'active' => 'sometimes|boolean',
        ]);

        if ($request->hasFile('image')) {
            // delete old image if exists and is in storage
            if ($paymentMethod->image && Storage::disk('public')->exists($paymentMethod->image)) {
                Storage::disk('public')->delete($paymentMethod->image);
            }
            $path = $request->file('image')->store('payment_methods', 'public');
            $data['image'] = $path;
        }

        $paymentMethod->update($data);

        return redirect()->route('user.payment-methods.index')
            ->with('success', 'Payment method updated.');
    }

    public function destroy(PaymentMethod $paymentMethod)
    {
        if (Auth::id() !== $paymentMethod->user_id) {
            abort(403);
        }
        if ($paymentMethod->image && Storage::disk('public')->exists($paymentMethod->image)) {
            Storage::disk('public')->delete($paymentMethod->image);
        }
        $paymentMethod->delete();
        return redirect()->route('user.payment-methods.index')
            ->with('success', 'Payment method removed.');
    }
}
