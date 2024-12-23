<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="Wally_Yoon" />

    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! JsonLd::generate() !!}

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Icon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('storage/icon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('storage/icon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('storage/icon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('storage/icon/site.webmanifest') }}">

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&display=swap" rel="stylesheet">

    <!-- SEO -->
    <meta name="google-site-verification" content="omPgIWqnBfqP7j0mgp3cWOcvTQodgpxCdUM8QvR87Wg" />
    <meta name="naver-site-verification" content="0aedc057c577ca3d446182dda3f909b581ea718d" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Recaptcha -->
    <script src="https://www.google.com/recaptcha/api.js?render={{ config('app.recaptcha_site_key') }}"></script>
</head>
<style>
    body {
        /* Google font */
        font-family: "Nanum Gothic", sans-serif !important;
    }
</style>
