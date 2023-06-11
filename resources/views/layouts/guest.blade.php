@include('layouts.header')

<body class="container mx-auto px-4">
    <div class="min-h-screen flex flex-col justify-center items-center">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 border-2 bg-white shadow-md overflow-hidden rounded-lg">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
