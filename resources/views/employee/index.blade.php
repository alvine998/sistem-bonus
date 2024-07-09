@extends('layouts.app')

@section('content')
@if(session()->has('success'))
<div class="bg-green-200 w-full p-2">
    <p class="text-green-500">Berhasil Menyimpan Data!</p>
</div>
@elseif(session()->has('error'))
<div class="bg-red-200 w-full p-2">
    <p class="text-red-500">Gagal Menyimpan Data!</p>
</div>
@endif

<div class="mt-[50px] px-10">
    <h2 class="text-2xl font-bold">Data Mekanik</h2>
    <div class="flex justify-between mt-4">
        <form id="refresh-form" action="{{ route('employee.refreshscore') }}" method="POST" style="display:none;">
            @csrf
        </form>
        <a href="#" onclick="event.preventDefault(); document.getElementById('refresh-form').submit();" class="w-auto p-2 bg-green-500 rounded text-white">
            Perbarui Data
        </a>
        <a href="{{route('employee.create')}}" class="w-auto p-2 bg-blue-500 rounded text-white">Tambah Data</a>
    </div>
    <div class="overflow-x-auto mt-5">
        <table class="w-full table-auto pb-2">
            <thead>
                <tr>
                    <th class="border border-black bg-gray-300 px-4 py-2">Nama</th>
                    <th class="border border-black bg-gray-300 px-4 py-2">Kehadiran</th>
                    <th class="border border-black bg-gray-300 px-4 py-2">Komplain Pelanggan</th>
                    <th class="border border-black bg-gray-300 px-4 py-2">Komplain Kendaraan</th>
                    <th class="border border-black bg-gray-300 px-4 py-2">Total Servis</th>
                    <th class="border border-black bg-gray-300 px-4 py-2">Komplain Tim</th>
                    <th class="border border-black bg-gray-300 px-4 py-2">Nilai V</th>
                    <th class="border border-black bg-gray-300 px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($employee as $item)
                <tr>
                    <td class="border px-4 py-2 border-black text-center">
                        {{$item->name}}
                    </td>
                    <td class="border px-4 py-2 border-black text-center">
                        {{$item->presence}}
                    </td>
                    <td class="border px-4 py-2 border-black text-center">
                        {{$item->customer_complain}}
                    </td>
                    <td class="border px-4 py-2 border-black text-center">
                        {{$item->vehicle_complain}}
                    </td>
                    <td class="border px-4 py-2 border-black text-center">
                        {{$item->total_service}}
                    </td>
                    <td class="border px-4 py-2 border-black text-center">
                        {{$item->team_complain}}
                    </td>
                    <td class="border px-4 py-2 border-black text-center">
                        {{$item->total_bonus}}
                    </td>
                    <td class="border px-4 py-2 border-black text-center flex gap-2 justify-center">
                        <a href="{{route('employee.edit', $item)}}" class="w-5 h-5 text-green-700 hover:text-green-500">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <form onsubmit="return confirm('Apakah anda yakin ingin menghapus data {{$item->name}}?')" action="{{route('employee.destroy', $item->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="w-5 h-5 text-red-700 hover:text-red-500">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <div class="bg-red-200 w-full p-2 rounded-md my-2">
                    <p class="text-red-500">Data Mekanik Tidak Tersedia</p>
                </div>
                @endforelse
            </tbody>
        </table>
    </div>

    {{$employee->links()}}
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    function toggleModal(modalID) {
        document.getElementById(modalID).classList.toggle("hidden");
        document.getElementById(modalID).classList.toggle("flex");
    }
</script>
<script>
    let modal = document.getElementById('modal');
    let btn = document.getElementById('open-btn');
    let button = document.getElementById('ok-btn');

    btn.onclick = function() {
        modal.style.display = 'block';
    };

    button.onclick = function() {
        modal.style.display = 'none';
    };

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
@endsection