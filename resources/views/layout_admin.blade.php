<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <title>SERASI | Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="/js/jquery.min.js"></script>
    <link rel="stylesheet" href="/css/datatables_edit.css">
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/js/dataTables.tailwindcss.min.js"> --}}
    {{-- <script src="/js/dataTables.tailwindcss.min.js"></script> --}}

</head>
<body>
    <div class="w-full lg:px-10 h-14 sticky bg-[#1EA05E] text-white flex flex-row justify-between items-center">
        <div>
          <a href="/" class="text-white font-bold text-2xl italic">SERASI</a>
        </div>
        <div class="flex flex-row space-x-4">
          <a href="/" class="text-white">Home</a>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-white hover:text-red-500">Logout</button>
          </form>
        </div>
      </div>
    <div class="p-10 overflow-auto">
        @yield('content')
     </div>

     <script src="/js/jquery.dataTables.min.js"></script>
</body>