<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
</head>
<body class="bg-lightBone flex gap-5">
    <div class="ml-[-30px] justify-start">
        <img src="{{ asset('assets/order-sidepict.jpg') }}" class="max-h-screen">
    </div>
    <div class="flex-row gap-10 max-w-[500px]">
        <div class="flex-col mt-12 ml-5">
            <h1 class="text-[#54382E] font-ebGaramond text-[45px] font-bold">BEGIN YOUR <br> PROJECT WITH US</h1>
            <p class="text-[18px] font-albertSans text-[#807771]">Fill the form below!</p>
        </div>
        <div>
            <form action="" method="POST" class="flex flex-col gap-5 mt-10 ml-5">
            @csrf
            <label for="username" class="text-black text-[18px] font-albertSans font-semibold">Username</label>
                <input type="text" name="username" placeholder="Username" class="p-3 rounded border border-gray-300 w-[300px] focus:outline-none focus:ring-2 focus:ring-[#9C755E]">
            <label for="phone_number" class="text-black text-[18px] font-albertSans font-semibold">Phone Number</label>
            <div class="relative">
                <div>
                    Options
                </div>
                @foreach($codes as $c)
                <div value="{{ $c->code }}">
                    {{ $c->code }} {{ $c->name }}
                </div>
                @endforeach
            </div>
                <button type="submit" class="bg-[#54382E] text-white p-3 rounded hover:bg-[#402916] transition duration-300">Submit Order</button>
            </form>
            </div>
        </div>
</body>
</html>
