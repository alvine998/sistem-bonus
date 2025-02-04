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
    <h2 class="text-2xl font-bold">Kriteria</h2>
    <div class="flex justify-end">
        <a href="{{route('criteria.create')}}" class="w-auto p-2 bg-blue-500 rounded text-white">Tambah Data</a>
    </div>
    <div class="overflow-x-auto mt-5">
        <table class="w-full table-auto pb-2">
            <thead>
                <tr>
                    <th class="border border-black bg-gray-300 px-4 py-2">Kriteria</th>
                    <th class="border border-black bg-gray-300 px-4 py-2">Bobot Nilai</th>
                    <th class="border border-black bg-gray-300 px-4 py-2">Keterangan</th>
                    <th class="border border-black bg-gray-300 px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($criteria as $item)
                <tr>
                    <td class="border px-4 py-2 border-black text-center">
                        {{$item->name}}
                    </td>
                    <td class="border px-4 py-2 border-black text-center">
                        {{$item->percentage}}%
                    </td>
                    <td class="border px-4 py-2 border-black text-center">
                        {{$item->note}}
                    </td>
                    <td class="border px-4 py-2 border-black text-center flex gap-2 justify-center">
                        <a href="{{route('detail.index', $item)}}" class="w-5 h-5 text-orange-700 hover:text-orange-500" title="Detail">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{route('criteria.edit', $item)}}" class="w-5 h-5 text-green-700 hover:text-green-500 ml-3" title="Edit">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <form onsubmit="return confirm('Apakah anda yakin ingin menghapus data {{$item->name}}?')" action="{{route('criteria.destroy', $item->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="w-5 h-5 text-red-700 ml-3 hover:text-red-500">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>

                <x-modal-delete>
                    <form action="{{route('criteria.destroy', $item->id)}}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('DELETE')
                        <!-- Modal Header -->
                        <div class="flex justify-between items-center pb-3">
                            <p class="text-2xl font-bold">Kriteria</p>
                            <div class="modal-close cursor-pointer z-50" onclick="toggleModal('modal-delete')">
                                <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                    <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z" />
                                </svg>
                            </div>
                        </div>
                        <!-- Modal Body -->
                        <div class="mt-2">
                            <p class="my-2">Apakah anda yakin ingin menghapus data {{$item->name}}?</p>
                            <div class="flex items-center gap-2">
                                <button type="button" onclick="toggleModal('modal-delete')" class="w-full p-1 rounded bg-white text-black hover:border-2 duration-200 mt-4">Batal</button>
                                <button type="submit" class="w-full p-1 rounded bg-red-500 text-white hover:bg-red-600 duration-200 mt-4">Hapus</button>
                            </div>
                        </div>
                    </form>
                </x-modal-delete>
                @empty
                <div class="bg-red-200 w-full p-2 rounded-md my-2">
                    <p class="text-red-500">Data Kriteria Tidak Tersedia</p>
                </div>
                @endforelse
            </tbody>
        </table>
    </div>

    {{$criteria->links()}}
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