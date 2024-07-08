<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistem Bonus Gaji Karyawan</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link rel="stylesheet" href="../css/app.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        #map {
            height: 350px;
            width: 100%;
        }
    </style>
</head>

<body class="overflow-y-hidden">
    <div class="flex justify-between items-center h-[50px] w-full bg-blue-500">
        <div class="lg:ml-5">
            <h2 class="text-white text-xl font-semibold">Sistem Bonus Gaji Karyawan</h2>
        </div>
        <div class="flex items-center justify-end px-10 gap-10">
            <a href="/" class="text-white bg-red-700 hover:bg-red-600 p-2 rounded-md font-bold">Logout</a>
        </div>
    </div>
    <div class="flex">
        @include('layouts.sidebar')
        <div class="w-full h-[90vh] overflow-y-auto">
            @yield('content')
        </div>
    </div>
</body>

</html>