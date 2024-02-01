<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Faq;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::user()) {
            $user = Auth::user();
            $carts = Cart::where('user_id', $user->id)->get();
            $countCarts = Cart::where('user_id', Auth::user()->id)->count();


            $faq = Faq::all();
            $pricing = Package::all();



            return view('home', [
                'pricing' => $pricing,
                'faq' => $faq,
                'carts' => $carts,
                'countCarts' => $countCarts
            ]);
        } else {
            $faq = Faq::all();
            $pricing = Package::all();

            return view('home', [
                'pricing' => $pricing,
                'faq' => $faq,
                'countCarts' => null,

            ]);
        }
    }
}
