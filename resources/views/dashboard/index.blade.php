@extends('layouts.app')

@section('content')

<div class="mt-[50px] px-10">
    <h2 class="text-2xl font-bold">Dashboard</h2>
    <h5 class="font-bold">Selamat Datang, Admin</h5>
    <!-- <div class="flex gap-2">
        <div class="bg-green-400 shadow w-full rounded-md p-4 mt-2">
            <p>Total Mekanik:</p>
            <p>25</p>
        </div>
    </div> -->
    <div class="overflow-x-auto mt-5">
        <table class="w-full table-auto pb-2">
            <thead>
                <tr>
                    <th class="border border-black bg-gray-300 px-4 py-2">Kriteria</th>
                    <th class="border border-black bg-gray-300 px-4 py-2">Penilaian</th>
                    <th class="border border-black bg-gray-300 px-4 py-2">Nilai</th>
                    <th class="border border-black bg-gray-300 px-4 py-2">Bobot</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td rowspan="4" class="border px-4 py-2 border-black text-center">
                        Kehadiran
                    </td>
                    <td class="border px-4 py-2 border-black text-center">
                        100%
                    </td>
                    <td class="border px-4 py-2 border-black text-center">
                        100
                    </td>
                    <td rowspan="4" class="border px-4 py-2 border-black text-center">
                        25%
                    </td>
                </tr>
                <tr>
                    <td class="border px-4 py-2 border-black text-center">
                        81 - 99%
                    </td>
                    <td class="border px-4 py-2 border-black text-center">
                        90
                    </td>
                </tr>
                <tr>
                    <td class="border px-4 py-2 border-black text-center">
                        70 - 80%
                    </td>
                    <td class="border px-4 py-2 border-black text-center">
                        75
                    </td>
                </tr>
                <tr>
                    <td class="border px-4 py-2 border-black text-center">
                        < 70%
                    </td>
                    <td class="border px-4 py-2 border-black text-center">
                        50
                    </td>
                </tr>

                <!-- Pelayanan -->
                <tr>
                    <td rowspan="4" class="border px-4 py-2 border-black text-center">
                        Pelayanan
                    </td>
                    <td class="border px-4 py-2 border-black text-center">
                        0
                    </td>
                    <td class="border px-4 py-2 border-black text-center">
                        100
                    </td>
                    <td rowspan="4" class="border px-4 py-2 border-black text-center">
                        15%
                    </td>
                </tr>
                <tr>
                    <td class="border px-4 py-2 border-black text-center">
                        1 - 3
                    </td>
                    <td class="border px-4 py-2 border-black text-center">
                        90
                    </td>
                </tr>
                <tr>
                    <td class="border px-4 py-2 border-black text-center">
                        4 - 6
                    </td>
                    <td class="border px-4 py-2 border-black text-center">
                        75
                    </td>
                </tr>
                <tr>
                    <td class="border px-4 py-2 border-black text-center">
                        > 6
                    </td>
                    <td class="border px-4 py-2 border-black text-center">
                        50
                    </td>
                </tr>

                <!-- Kinerja -->
                <tr>
                    <td rowspan="4" class="border px-4 py-2 border-black text-center">
                        Kinerja
                    </td>
                    <td class="border px-4 py-2 border-black text-center">
                        0
                    </td>
                    <td class="border px-4 py-2 border-black text-center">
                        100
                    </td>
                    <td rowspan="4" class="border px-4 py-2 border-black text-center">
                        20%
                    </td>
                </tr>
                <tr>
                    <td class="border px-4 py-2 border-black text-center">
                        1 - 3
                    </td>
                    <td class="border px-4 py-2 border-black text-center">
                        90
                    </td>
                </tr>
                <tr>
                    <td class="border px-4 py-2 border-black text-center">
                        4 - 6
                    </td>
                    <td class="border px-4 py-2 border-black text-center">
                        75
                    </td>
                </tr>
                <tr>
                    <td class="border px-4 py-2 border-black text-center">
                        > 6
                    </td>
                    <td class="border px-4 py-2 border-black text-center">
                        50
                    </td>
                </tr>

                <!-- Pencapaian -->
                <tr>
                    <td rowspan="4" class="border px-4 py-2 border-black text-center">
                        Pencapaian
                    </td>
                    <td class="border px-4 py-2 border-black text-center">
                        > 360 Motor/3 Bulan
                    </td>
                    <td class="border px-4 py-2 border-black text-center">
                        100
                    </td>
                    <td rowspan="4" class="border px-4 py-2 border-black text-center">
                        30%
                    </td>
                </tr>
                <tr>
                    <td class="border px-4 py-2 border-black text-center">
                        301 - 360 Motor/3 Bulan
                    </td>
                    <td class="border px-4 py-2 border-black text-center">
                        90
                    </td>
                </tr>
                <tr>
                    <td class="border px-4 py-2 border-black text-center">
                        215 - 300 Motor/3 Bulan
                    </td>
                    <td class="border px-4 py-2 border-black text-center">
                        75
                    </td>
                </tr>
                <tr>
                    <td class="border px-4 py-2 border-black text-center">
                        < 215 Motor/3 Bulan
                    </td>
                    <td class="border px-4 py-2 border-black text-center">
                        50
                    </td>
                </tr>

                <!-- Kerjasama Tim -->
                <tr>
                    <td rowspan="4" class="border px-4 py-2 border-black text-center">
                        Kerjasama Tim
                    </td>
                    <td class="border px-4 py-2 border-black text-center">
                        0
                    </td>
                    <td class="border px-4 py-2 border-black text-center">
                        100
                    </td>
                    <td rowspan="4" class="border px-4 py-2 border-black text-center">
                        10%
                    </td>
                </tr>
                <tr>
                    <td class="border px-4 py-2 border-black text-center">
                        1 - 3
                    </td>
                    <td class="border px-4 py-2 border-black text-center">
                        90
                    </td>
                </tr>
                <tr>
                    <td class="border px-4 py-2 border-black text-center">
                        4 - 6
                    </td>
                    <td class="border px-4 py-2 border-black text-center">
                        75
                    </td>
                </tr>
                <tr>
                    <td class="border px-4 py-2 border-black text-center">
                        > 6
                    </td>
                    <td class="border px-4 py-2 border-black text-center">
                        50
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
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