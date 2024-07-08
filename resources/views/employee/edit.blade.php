@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center mt-[50px] px-10">
    <div class="bg-white shadow w-full rounded-md p-4">
        <h2 class="font-semibold text-xl">Ubah Data Mekanik</h2>
        <form action="{{route('employee.update', $employee->id)}}" enctype="multipart/form-data" method="post">
            @csrf
            @method('PUT')
            <div class="mt-10">
                <div class="flex flex-col gap-1">
                    <label for="name">Nama Mekanik</label>
                    <input id="name" name="name" type="text" value="{{old('name', $employee->name)}}" required placeholder="Masukkan Nama Kriteria" class="w-full p-1 pl-2 rounded border border-gray-300" />
                </div>
                <div class="flex flex-col gap-1 mt-2">
                    <label for="percentage">Status</label>
                    <div class="flex gap-2 items-center">
                        <input type="radio" name="status" id="status" value="1" {{old('status', $employee->status) == 1 ? "checked" : ""}}>
                        <span>Aktif</span>
                    </div>
                    <div class="flex gap-2 items-center">
                        <input type="radio" name="status" id="status" value="2" {{old('status', $employee->status) == 2 ? "checked" : ""}}>
                        <span>Non Aktif</span>
                    </div>
                </div>

                <div class="mt-5 flex justify-between items-center gap-2">
                    <a href="/employee" class="w-full p-1 rounded text-center bg-red-500 text-white hover:bg-red-600 duration-200">Batal</a>
                    <button type="submit" class="w-full p-1 rounded bg-blue-500 text-white hover:bg-blue-600 duration-200">Simpan</button>
                </div>
        </form>
    </div>
</div>
@endsection