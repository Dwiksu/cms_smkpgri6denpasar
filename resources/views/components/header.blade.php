<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="sudarma putra & dwiksu">
    <meta name="keywords" content="SMK, PGRI, DENPASAR, SMK PGRI 6 DENPASAR">
    @if (isset($metaTitle) && isset($metaDesc) && $metaTitle && $metaDesc)
        <meta name="application-name" content="{{ $metaTitle }}">
        <meta name="description" content="{{ $metaDesc }}">
    @endif

    <title>{{ $slot }} - SMK PGRI 6 Denpasar</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('assets/logo_smk_pgri_6.png') }}">

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- CKEditor --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>

    {{-- Fullcalendar --}}
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>

    {{-- Swiper --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>


    @if (session('success'))
        <meta name="swal-success" content="{{ session('success') }}">
    @endif

    @if (session('error') || $errors->any())
        <meta name="swal-error" content="{{ session('error') ?? 'Terdapat kesalahan pada form' }}">
    @endif


</head>

<body class="font-sans">
