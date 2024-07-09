@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center mt-[50px] px-10">
    <div class="bg-white shadow w-full rounded-md p-4">
        <h2 class="font-semibold text-xl">Ubah Data Akses Admin</h2>
        <form action="{{route('user.update', $user->id)}}" enctype="multipart/form-data" method="post">
            @csrf
            @method('PUT')
            <div class="w-full mt-5">
                <div class="flex flex-col gap-1">
                    <label for="name">Nama</label>
                    <input id="name" name="name" type="text" value="{{old('name', $user->name)}}" required placeholder="Masukkan Nama" class="w-full p-1 pl-2 rounded border border-gray-300" />
                </div>
                <div class="flex flex-col gap-1 mt-2">
                    <label for="email">Email</label>
                    <input id="email" name="email" type="email" value="{{old('email', $user->email)}}" required placeholder="Masukkan email" class="w-full p-1 pl-2 rounded border border-gray-300" />
                </div>

                <div class="flex flex-col gap-1 mt-2">
                    <label for="password">Password</label>
                    <input id="password" name="password" value="{{old('password')}}" type="password" required placeholder="Masukkan Password" class="w-full p-1 pl-2 rounded border border-gray-300" />
                </div>
            </div>

            <div class="mt-5 flex justify-between items-center gap-2">
                <a href="/user" class="w-full p-1 rounded text-center bg-red-500 text-white hover:bg-red-600 duration-200">Batal</a>
                <button type="submit" class="w-full p-1 rounded bg-blue-500 text-white hover:bg-blue-600 duration-200">Simpan</button>
            </div>
        </form>
    </div>
</div>

@endsection