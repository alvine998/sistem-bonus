<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index()
    {
        // $store = Store::whereNull('deleted_at')->count();
        // $user = User::whereNull('deleted_at')->count();
        // $absent = Absent::whereNull('deleted_at')->count();
        // $visitor = Visit::whereNull('deleted_at')->count();
        // $product = Product::whereNull('deleted_at')->count();

        // if (Auth::check()) {
        //     return view('dashboard.index', compact('store', 'user', 'absent', 'visitor', 'product'));
        // }

        // return redirect("/")->withSuccess('Opps! You do not have access');
        return view('dashboard.index');
    }
}
