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
        
    </head>
<body class="font-sans">

