<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.bunny.net">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @if(auth()->check() && auth()->user()->role->name == App\Constants\UserConstant::ROLE_ADMIN || auth()->user()->role->name == App\Constants\UserConstant::ROLE_SUPERADMIN)
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
        <style>
            [type=text], input:where(:not([type])), [type=email], [type=url], [type=password], [type=number], [type=date], [type=datetime-local], [type=month], [type=search], [type=tel], [type=time], [type=week], [multiple], textarea, select {
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                background-color: #111827;
                border-color: #111827;
                border-width: 0;
                color: #ffffff;
                /*border-radius: 10px;*/
            }
            .form-control {
                background-color: #111827;
                color: #ffffff;
                border-width: 0;


            }
        </style>
        {{--            <link rel="stylesheet" href="{{ asset('admin/assets/style.css') }}">--}}
    @else
        <link rel="stylesheet" href="{{ asset('user/assets/style.css') }}">
    @endif
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" rel="stylesheet">

    <!-- Scripts -->
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100 dark:bg-gray-900">
@include('layouts.navigation')

<!-- Page Heading -->
    @if (isset($header))
        <header class="dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
@endif

<!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>

@include('.layouts.toaster')

</body>
</html>
