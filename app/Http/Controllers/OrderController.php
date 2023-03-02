<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Tiket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function index()
    {
        $user = Auth::user()->id;
        $orders = Order::where('user_id', $user)->with(['Tiket'])->get();
        return view('order', compact('orders'));
    }

    public function detail($id)
    {
        $tiket = Tiket::findorfail($id);
        return view('tiket.Detail', compact('tiket'));
    }

    public function OrderTiket(Request $request)
    {
        $id = $request->id;

        Order::insert([
            'tiket_id' => $id,
            'order_number' => 'ORD-' . strtoupper(Str::random(10)),
            'user_id' => $request->user()->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'city' => $request->city,
            'no_ktp' => $request->no_ktp,
            'address' => $request->address,
            'status' => 'valid'

        ]);
        return redirect()->route('home');
    }
}


// $id = $request->id;
// Order::insert([
//     'tiket_id' => $id,
//     'order_number' => 'ORD-' . strtoupper(Str::random(10)),
//     'user_id' => $request->user()->id,
//     'first_name' => $request->price,
//     'last_name' => $request->price,
//     'email' => $request->price,
//     'phone' => $request->price,
//     'city' => $request->price,
//     'no_ktp' => $request->price,
//     'address' => $request->price,
//     'status' => 'valid'

// ]);
// return redirect()->route('home');