@extends('layouts.app')

@section('content')

<div class="mt-[50px] px-10">
    <h2 class="text-2xl font-bold">Dashboard</h2>
    <h5 class="font-bold">Selamat Datang, Admin</h5>
    <div class="flex gap-2">
        <div class="bg-green-400 shadow w-full rounded-md p-4 mt-2">
            <p>Total Karyawan:</p>
            <p>25</p>
        </div>
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