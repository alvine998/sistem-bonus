<?php

namespace App\Http\Controllers;

use App\Models\User as ModelsUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class User extends Controller
{
    public function index()
    {
        $user = ModelsUser::latest()->whereNull('deleted_at')->paginate(5);
        // if (Auth::check()) {
        //     return view('user.index', compact('user'));
        // }
        // return redirect("/")->withSuccess('Opps! You do not have access');
        return view('user.index', compact('user'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $req)
    {
        $this->validate($req, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:8',
        ]);
        $hashPassword = Hash::make($req->password);

        ModelsUser::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => $hashPassword,
        ]);

        return redirect()->route('user.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(ModelsUser $user)
    {
        return view("user.edit", compact('user'));
    }

    public function update(Request $req, ModelsUser $user)
    {
        $this->validate($req, [
            'name' => 'required',
            'email' => 'required',
        ]);

        if ($req->password) {
            $hashPassword = Hash::make($req->password);

            $user->update([
                'name' => $req->name,
                'email' => $req->email,
                'password' => $hashPassword,
            ]);
        } else {
            $user->update([
                'name' => $req->name,
                'email' => $req->email,
            ]);
        }
        return redirect()->route('user.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function destroy(ModelsUser $user)
    {
        $user->deleted_at = now();
        $user->save();
        return redirect()->route('user.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
