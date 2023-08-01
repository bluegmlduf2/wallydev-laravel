@include('layouts.header')

<body class="max-w-screen-xl mx-auto px-4 pb-4">
    <!-- Spinner -->
    @include('components.spinner')
    
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
