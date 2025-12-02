<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
</head>
<body class="bg-gradient-to-b from-[#FFF1E0] from-60% to-[#4B2C2C] to-99% min-h-screen flex justify-center gap-8 ml-32 items-center">

    <!-- Sidebar Navigation -->
    <nav class="w-[346px] p-8 h-[828px]">
        <div class="bg-gradient-to-t from-[#FFF5E8] from-30% to-80% to-[#C49E6C]/20  rounded-[10px] border-2 border-[#5D3E3E] p-8 h-full flex flex-col justify-between">


            <div class="space-y-6">
                <a href="{{ route('admin.profile') }}" class="flex items-center gap-4 text-[#5D3E3E] hover:text-[#987979] transition text-albertSans text-[18px]">
                    <img src={{ asset('assets/profile.svg') }} alt="" class="">
                    <span>Profile</span>
                </a>


                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-4 text-[#5D3E3E] hover:text-[#987979] transition text-albertSans text-[18px]">
                    <img src={{ asset('assets/dashboard-choco.svg') }} alt="">
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('admin.products') }}" class="flex items-center gap-4 text-[#5D3E3E] hover:text-[#987979] transition text-albertSans text-[18px]">
                    <img src={{ asset('assets/category.svg') }} alt="">
                    <span>Category Product</span>
                </a>
            </div>

            <a href="{{ route('logout') }}" class="flex items-center gap-4 text-[#5D3E3E] hover:text-[#987979] transition text-albertSans text-[18px]">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
                <span>Logout</span>
            </a>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-1 p-8">
        @yield('content')
    </main>

</body>
</html>
