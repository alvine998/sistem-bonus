@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center mt-[50px] px-10">
    <div class="bg-white shadow w-full rounded-md p-4">
        <h2 class="font-semibold text-xl">Tambah Data Mekanik</h2>
        <form action="{{route('employee.store')}}" enctype="multipart/form-data" method="post">
            @csrf
            <!-- Modal Body -->
            <div class="mt-10">
                <div class="flex flex-col gap-1">
                    <label for="name">Nama Mekanik</label>
                    <input id="name" name="name" type="text" value="{{old('name')}}" required placeholder="Masukkan Nama Mekanik" class="w-full p-1 pl-2 rounded border border-gray-300" />
                </div>
                <div class="flex flex-col gap-1 mt-2">
                    <label for="presence">Jumlah Kehadiran</label>
                    <input id="presence" name="presence" type="number" value="{{old('presence')}}" required placeholder="Masukkan Jumlah Kehadiran" class="w-full p-1 pl-2 rounded border border-gray-300" />
                </div>
                <div class="flex flex-col gap-1 mt-2">
                    <label for="customer_complain">Jumlah Komplain Pelayanan</label>
                    <input id="customer_complain" name="customer_complain" type="number" value="{{old('customer_complain')}}" required placeholder="Masukkan Jumlah Komplain Pelayanan" class="w-full p-1 pl-2 rounded border border-gray-300" />
                </div>
                <div class="flex flex-col gap-1 mt-2">
                    <label for="vehicle_complain">Jumlah Komplain Kendaraan</label>
                    <input id="vehicle_complain" name="vehicle_complain" type="number" value="{{old('vehicle_complain')}}" required placeholder="Masukkan Jumlah Komplain Kendaraan" class="w-full p-1 pl-2 rounded border border-gray-300" />
                </div>
                <div class="flex flex-col gap-1 mt-2">
                    <label for="total_service">Jumlah Kendaraan Diservis</label>
                    <input id="total_service" name="total_service" type="number" value="{{old('total_service')}}" required placeholder="Masukkan Jumlah Kendaraan Diservis" class="w-full p-1 pl-2 rounded border border-gray-300" />
                </div>
                <div class="flex flex-col gap-1 mt-2">
                    <label for="team_complain">Komplain Kerjasama Tim</label>
                    <input id="team_complain" name="team_complain" type="number" value="{{old('team_complain')}}" required placeholder="Masukkan Komplain Kerjasama Tim" class="w-full p-1 pl-2 rounded border border-gray-300" />
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