@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center mt-[50px] px-10">
    <div class="bg-white shadow w-full rounded-md p-4">
        <h2 class="font-semibold text-xl">Ubah Detail Kriteria</h2>
        <form action="{{route('detail.update', [$criterion, $detail->id])}}" enctype="multipart/form-data" method="post">
            @csrf
            @method('PUT')
            <div class="mt-10">
                <div class="flex flex-col gap-1">
                    <label for="detail">Detail Kriteria</label>
                    <input id="detail" name="detail" type="text" value="{{old('detail', $detail->detail)}}" required placeholder="Masukkan Detail Kriteria" class="w-full p-1 pl-2 rounded border border-gray-300" />
                </div>
                <div class="flex flex-col gap-1 mt-2">
                    <label for="score">Nilai</label>
                    <input id="score" name="score" type="number" value="{{old('score', $detail->score)}}" required placeholder="Masukkan Nilai" class="w-full p-1 pl-2 rounded border border-gray-300" />
                </div>
            </div>
            <div class="mt-5 flex justify-between items-center gap-2">
                <a href="{{route('detail.index', $criterion)}}" class="w-full p-1 rounded text-center bg-red-500 text-white hover:bg-red-600 duration-200">Batal</a>
                <button type="submit" class="w-full p-1 rounded bg-blue-500 text-white hover:bg-blue-600 duration-200">Simpan</button>
            </div>
        </form>
    </div>
</div>

@endsection