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
<body class="bg-lightBone flex">
    <div class=" ">
        <img src="{{ asset('assets/order-sidepict.jpg') }}" class="ml-[-30px] object-cover h-223"/>
    </div>
    <div class="flex-row max-w-[800px]">

        <div class="flex">
            <div class="flex-col mt-5 ml-5">
                <a href="/">
                    <img src="{{ asset('assets/arrow-back.svg') }}" alt="back" class="md:w-15 w-26">
                </a>
                <h1 class="text-[#54382E] font-ebGaramond text-[45px] font-bold">BEGIN YOUR <br> PROJECT WITH US</h1>
                <p class="text-[18px] font-albertSans text-[#807771]">Fill the form below!</p>
            </div>
             @if (session('success'))
        <div class="mt-12 p-3 bg-green-200 text-black rounded w-fit h-fit ml-4" role="alert">
            {{ session('success') }} <a href="{{ route("user.drafts") }}" class="flex underline"> go to draft</a>
        </div>
    @endif
        </div>
            <form action="" method="POST" class="flex flex-col px-10">
            @csrf
            <div class="flex gap-5 mt-10">
                <div class="flex flex-col gap-4">
            <label for="username" class="text-black text-[18px] font-albertSans font-semibold">Username</label>
                <input type="text" name="username" placeholder="Username" class="p-3 rounded border border-gray-600 w-[300px] focus:outline-none focus:ring-2 focus:ring-[#9C755E] transition duration-300" required>
            <label for="phone_number" class="text-black text-[18px] font-albertSans font-semibold">Phone Number</label>
                <input type="text" name="phone_number" placeholder="ex: 0123456789" class="p-3 rounded border border-gray-600 w-[300px] focus:outline-none focus:ring-2 focus:ring-[#9C755E] transition duration-300" required>
            {{-- <div class="relative">
                <div>
                    Options
                </div>
                @foreach($codes as $c)
                <div value="{{ $c->code }}">
                    {{ $c->code }} {{ $c->name }}
                </div>
                @endforeach
            </div> --}}
            <label for="category" class="text-black text-[18px] font-albertSans font-semibold">Category</label>
                <div class="flex gap-4">
                    <input type="radio" id="ext" name="category" class="peer/ext hidden" value="Exterior">
                    <label for="ext" class="w-fit p-4 rounded-[5px] bg-[#F4E3D8] cursor-pointer peer-checked/ext:border-2 peer-checked/ext:border-inputBox">
                        Exterior Design
                    </label>
                    <input type="radio" id="int" name="category" class="peer/int hidden" value="Interior">
                    <label for="int" class="w-fit p-4 rounded-[5px] bg-[#F4E3D8] cursor-pointer peer-checked/int:border-2 peer-checked/int:border-inputBox">
                        Interior Design
                    </label>
                </div>
                <label for="visual" class="text-black text-[18px] font-albertSans font-semibold">Visual</label>

                <div class="gap-4 flex w-[400px]">
                    <input type="radio" id="vis" name="visual" class="peer/vis hidden" value="3D Visualization">
                    <label for="vis" class="w-fit p-4 rounded-[5px] bg-[#F4E3D8] cursor-pointer peer-checked/vis:border-2 peer-checked/vis:border-inputBox">
                        3D Visualization
                    </label>
                    <input type="radio" id="anm" name="visual" class="peer/anm hidden" value="3DAnimation">
                    <label for="anm" class="w-fit p-4 rounded-[5px] bg-[#F4E3D8] cursor-pointer peer-checked/anm:border-2 peer-checked/anm:border-inputBox">
                        3D Animation
                    </label>
                    <br/>
                    <input type="radio" id="flr" name="visual" class="peer/flr hidden" value="Floor Plan">
                    <label for="flr" class="w-fit p-4 rounded-[5px] bg-[#F4E3D8] cursor-pointer peer-checked/flr:border-2 peer-checked/flr:border-inputBox">
                        Floor Plan
                    </label>
                </div>
                </div>
                <div class="flex flex-col gap-4 ml-[-20px]">
                    <label for="email" class="text-black text-[18px] font-albertSans font-semibold">Email</label>
                        <input type="email" name="email" placeholder="Email" class="p-3 rounded border border-gray-600 w-[300px] focus:outline-none focus:ring-2 focus:ring-[#9C755E] transition duration-300">
                    <label for="area" class="text-black text-[18px] font-albertSans font-semibold">Area</label>
                    <span class="text-[#807771] text-sm mb-1 mt-[-20px]">start from 100.000/m2</span>
                        <input type="text" name="area" placeholder="Area (in m2)" class="p-3 rounded border border-gray-600 w-[300px] focus:outline-none focus:ring-2 focus:ring-[#9C755E] transition duration-300">
                    <label for="typeOfBuilding" class="text-black text-[18px] font-albertSans font-semibold">Type of Building</label>
                    <select name="typeOfBuilding" class="w-[300px] p-3 rounded border border-gray-600 focus:outline-none focus:ring-2 focus:ring-[#9C755E] transition duration-300">
                        <option value="Residential" class="w-min-[200px]">Residential</option>
                        <option value="Office">Office</option>
                        <option value="Industrial">Industrial</option>
                        <option value="Mansion">Mansion</option>
                    </select>
                </div>
                </div>
                <div class="flex gap-4 w-full mt-18 ">
                    <button type="submit" class="bg-[#54382E] text-white p-3 rounded hover:bg-[#402916] transition duration-300 w-full">Draft Order</button>
                </div>
            </form>
        </div>
</body>
</html>
