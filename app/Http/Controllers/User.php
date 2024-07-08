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
        if (Auth::check()) {
            return view('user.index', compact('user'));
        }
        return redirect("/")->withSuccess('Opps! You do not have access');
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $req)
    {
        $this->validate($req, [
            'name' => 'required',
            'nik' => 'required',
            'type' => 'required',
            'password' => 'required|min:8',
            'user_name' => 'required',
            'user_type' => 'required',
            'user_id' => 'required'
        ]);
        $hashPassword = Hash::make($req->password);

        if ($req->file('photo')) {
            $photo = $req->file('photo');
            $photo->storeAs('public/storage', $photo->hashName());
            ModelsUser::create([
                'name' => $req->name,
                'nik' => $req->nik,
                'notes' => $req->notes,
                'type' => $req->type,
                'password' => $hashPassword,
                'role' => $req->role,
                'photo' => $photo->hashName(),
                'created_by' => json_encode([
                    'user_name' => $req->user_name,
                    'user_type' => $req->user_type,
                    'user_id' => $req->user_id,
                ])
            ]);
        } else {
            ModelsUser::create([
                'name' => $req->name,
                'nik' => $req->nik,
                'notes' => $req->notes,
                'type' => $req->type,
                'password' => $hashPassword,
                'role' => $req->role,
                'created_by' => json_encode([
                    'user_name' => $req->user_name,
                    'user_type' => $req->user_type,
                    'user_id' => $req->user_id,
                ])
            ]);
        }

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
            'nik' => 'required',
            'type' => 'required',
            'user_name' => 'required',
            'user_type' => 'required',
            'user_id' => 'required'
        ]);

        if ($req->password) {
            $hashPassword = Hash::make($req->password);

            $user->update([
                'name' => $req->name,
                'nik' => $req->nik,
                'notes' => $req->notes,
                'type' => $req->type,
                'password' => $hashPassword,
                'role' => $req->role,
                'created_by' => json_encode([
                    'user_name' => $req->user_name,
                    'user_type' => $req->user_type,
                    'user_id' => $req->user_id,
                ])
            ]);
        } else if ($req->file('photo')) {
            $photo = $req->file('photo');
            $photo->storeAs('public/storage', $photo->hashName());

            $user->update([
                'name' => $req->name,
                'nik' => $req->nik,
                'notes' => $req->notes,
                'type' => $req->type,
                'role' => $req->role,
                'photo' => $photo->hashName(),
                'created_by' => json_encode([
                    'user_name' => $req->user_name,
                    'user_type' => $req->user_type,
                    'user_id' => $req->user_id,
                ])
            ]);
        } else {
            $user->update([
                'name' => $req->name,
                'nik' => $req->nik,
                'notes' => $req->notes,
                'type' => $req->type,
                'role' => $req->role,
                'created_by' => json_encode([
                    'user_name' => $req->user_name,
                    'user_type' => $req->user_type,
                    'user_id' => $req->user_id,
                ])
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
