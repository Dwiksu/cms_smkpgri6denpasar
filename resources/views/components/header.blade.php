<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ $metaDesc }}">
    <meta name="author" content="sudarma putra & dwiksu">
    <meta name="keywords" content="SMK, PGRI, DENPASAR, SMK PGRI 6 DENPASAR">
    <meta name="application-name" content="{{ $metaTitle }}">

    <title>{{ $slot }} | SADGRISKA</title>

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>


    @if (session('success'))
        <meta name="swal-success" content="{{ session('success') }}">
    @endif

    @if (session('error') || $errors->any())
        <meta name="swal-error" content="{{ session('error') ?? 'Terdapat kesalahan pada form' }}">
    @endif


</head>

<body class="font-sans">
