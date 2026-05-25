<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/tailwind.css') }}" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <title>User Profile Settings</title>
</head>


<body class="bg-gradient-to-b from-[#EBCBB8] from-50% to-[#A97A68] to-100% min-h-screen flex">
        <div class="m-10">
            <a href="/">
                <img src="{{ asset('assets/arrow-back.svg') }}" alt="Logo" class="w-18 h-18">
            </a>
        </div>
        <div class="flex justify-center gap-8 ml-40 mt-10">
        <aside class="w-[230px] bg-[#54382E] h-fit flex flex-col rounded-[5px] mt-[50px]">
            <div class="p-4 flex flex-col gap-6 m-5">
                    <ul class="flex flex-col gap-6">
                        <div class="flex">
                            <a>
                                <img src="{{ asset('assets/profile2.svg') }}" alt="profile icon" class="inline w-5 h-5 mr-2">
                            </a>
                            <li class="px-2 mt-1"><a href="{{ route('profile') }}" class="text-[#F3F3F3] font-albertSans">Profile Settings</a></li>
                        </div>

                        <div class="flex">
                            <a>
                                <img src="{{ asset('assets/drafts.svg') }}" alt="drafts icon" class="inline w-5 h-5 mr-2">
                            </a>
                            <li class="px-1 mt-1"><a href="{{ route('user.drafts') }}" class="text-[#F3F3F3] font-albertSans">Drafts</a></li>
                        </div>

                        <div class="flex">
                            <a>
                                <img src="{{ asset('assets/finished.svg') }}" alt="finished icon" class="inline w-5 h-5 mr-2">
                            </a>
                            <li class="px-1 mt-1"><a href="{{ route('finished') }}" class="text-[#F3F3F3] font-albertSans">Finished</a></li>
                        </div>

                        <div class="flex">
                            <a>
                                <img src="{{ asset('assets/progress.svg') }}" alt="progress icon" class="inline w-5 h-5 mr-2">
                            </a>
                            <li class="px-1"><a href="{{ route('progress') }}" class="text-[#F3F3F3] font-albertSans">On Progress</a></li>
                        </div>

                        <li class="py-2"><a href="{{ route('logout') }}" class="text-red-600">Logout</a></li>
                    </ul>

                    <form action="{{ route('user.deleteAccount', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="font-albertSans text-[#ffffff9f]">Delete</button>
                    </form>
            </div>
        </aside>
        <main class="">
            @yield('content')
        </main>
        </div>
</body>
</html>
