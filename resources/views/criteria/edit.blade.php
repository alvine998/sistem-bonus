@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center mt-[50px] px-10">
    <div class="bg-white shadow w-full rounded-md p-4">
        <h2 class="font-semibold text-xl">Ubah Data Kriteria</h2>
        <form action="{{route('criteria.update', $criterion->id)}}" enctype="multipart/form-data" method="post">
            @csrf
            @method('PUT')
            <div class="mt-10">
                <div class="flex flex-col gap-1">
                    <label for="name">Nama Kriteria</label>
                    <input id="name" name="name" type="text" value="{{old('name', $criterion->name)}}" required placeholder="Masukkan Nama Kriteria" class="w-full p-1 pl-2 rounded border border-gray-300" />
                </div>
                <div class="flex flex-col gap-1 mt-2">
                    <label for="percentage">Bobot Nilai (%)</label>
                    <input id="percentage" name="percentage" type="number" value="{{old('percentage', $criterion->percentage)}}" required placeholder="Masukkan Bobot Nilai %" class="w-full p-1 pl-2 rounded border border-gray-300" />
                </div>
                <div class="flex flex-col gap-1 mt-2">
                    <label for="note">Keterangan</label>
                    <textarea id="note" name="note" type="text" value="{{old('note', $criterion->note)}}" required placeholder="Masukkan Keterangan" class="w-full p-1 pl-2 rounded border border-gray-300">{{old('note', $criterion->note)}}</textarea>
                </div>
            </div>
            <div class="mt-5 flex justify-between items-center gap-2">
                <a href="/criteria" class="w-full p-1 rounded text-center bg-red-500 text-white hover:bg-red-600 duration-200">Batal</a>
                <button type="submit" class="w-full p-1 rounded bg-blue-500 text-white hover:bg-blue-600 duration-200">Simpan</button>
            </div>
        </form>
    </div>
</div>

@endsection