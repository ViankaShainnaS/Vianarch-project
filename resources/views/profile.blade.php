<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/tailwind.css') }}" rel="stylesheet">
    <title>User Profile Settings</title>
</head>


<body class="bg-gray-100">
    <div class="flex">
        <aside class="w-1/4 bg-white shadow-md">
            <div class="p-4">
                <h2 class="text-lg font-semibold">Menu</h2>
                    <ul class="mt-4">
                        <li class="py-2"><a href="{{ route('profile') }}" class="text-blue-600">Profile Setting</a></li>
                        <li class="py-2"><a href="{{ route('finished') }}" class="text-gray-600">Finished</a></li>
                        <li class="py-2"><a href="{{ route('progress') }}" class="text-gray-600">On Progress</a></li>
                        <li class="py-2"><a href="{{ route('logout') }}" class="text-red-600">Logout</a></li>
                    </ul>
                    <form action="{{ route('user.deleteAccount', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
            </div>
        </aside>
        <main class="w-3/4 p-6">
            @yield('content')
    </div>
</body>
</html>
