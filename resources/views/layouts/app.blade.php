@include('layouts.header')

<body class="container mx-auto px-4 pb-4">
    <!-- Navbar -->
    @include('layouts.navigation')

    <!-- Page Heading -->
    @if (isset($header))
        <header>
            {{ $header }}
        </header>
    @endif
    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
</body>

</html>
