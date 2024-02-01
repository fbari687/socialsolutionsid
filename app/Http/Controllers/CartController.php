<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addCart(Request $request)
    {
        $package = Package::where('slug', $request->packageSlug)->first();

        $data = [
            'user_id' => Auth::user()->id,
            'package_id' => $package->id,
        ];

        Cart::create($data);

        return redirect('/')->with('status', 'Berhasil Menambah Package Ke dalam Cart');
    }

    public function deleteFromCart(Request $request, $slug)
    {
        $cart = Cart::where('slug', $slug)->first();

        if ($cart) {
            $cart->delete();

            // Assuming you want to redirect back with a success message
            return redirect()->back()->with('success', 'Item removed from cart successfully');
        }

        // Assuming you want to redirect back with an error message
        return redirect()->back()->with('error', 'Cart item not found.');
    }

    public function view($slug)
    {
        $cart = Cart::where('slug', $slug)->first();
        return view('payment', ['cart' => $cart]);
    }
    public function payment(Request $request, $slug)
    {
        $cart = Cart::where('slug', $slug)->first();

        if ($cart) {
            $cart->delete();

            // Assuming you want to redirect back with a success message
            return redirect('home')->with('success', 'Payment success');
        }

        // Assuming you want to redirect back with an error message
        return redirect('home')->with('error', 'Cart item not found.');
    }
}
