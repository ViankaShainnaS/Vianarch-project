@extends('admin.adminMenu')

@section('content')
<div class="flex flex-col w-[933px] max-h-[768px] p-5 border-2 border-[#5D3E3E] rounded-[10px] bg-gradient-to-b from-[#C49E6C]/10 from-30% to-[#FFF5E8] to-100%">
        {{-- header --}}
    <div>
        <p class="m-3 text-[#5D3E3E] font-albertSans text-[18px] font-medium">Welcome back, admin</p>
        <h1 class="font-libreBodoni italic text-[50px] ml-3 text-[#5D3E3E]">Dashboard</h1>
    </div>
    {{-- back button --}}
    <div class=" flex justify-between mt-5">
        <a href="{{ route('admin.dashboard') }}" class="flex gap-3 m-2">
            <img src="{{ asset('assets/arrow-back.svg') }}" class="w-[27px]" alt="">
            <p class="mt-3 font-albertSans text-[18px]">Edit Progress</p>
        </a>
        {{-- finish button --}}
        <form action="{{ route('admin.progress.finish', $orders->id) }}" method="POST" class="flex self-end mr-10 mb-5">
            @csrf
            @method('PUT')
            <button type="submit" class="bg-[#5d3e3e] text-white cursor-pointer font-albertSans py-2 px-3 rounded-[4px] hover:bg-transparent border-2 border-solid border-[#5d3e3e] hover:text-[#4b2c2c] transition-all ease-in-out duration-300">
                Finish Project
            </button>
        </form>
    </div>

    {{-- biodata section --}}
    <div class="flex gap-6">
        <div class="flex flex-col items-center m-10">
            <h1 class="text-[20px] font-albertSans text-[#000000] font-semibold text-center mb-1">{{$orders->user->name}}</h1>
            <h3 class="font-albertSans font-light text-[15px] mb-3">{{$orders->phone_number}}</h3>
            <a href="https://wa.me/62{{ $orders->phone_number }}" target="_blank">
                <div class="flex w-[137px] h-[36px] bg-[#5d3e3e] text-center items-center justify-center text-white cursor-pointer font-albertSans py-2 px-3 rounded-[4px] hover:bg-transparent border-2 border-solid border-[#5d3e3e] hover:text-[#4b2c2c] transition-all ease-in-out duration-300">
                    <p class="text-[15px] font-albertSans">Send Message</p>
                </div>
            </a>
        </div>
        <div class="flex flex-col ml-2 mt-5 gap-13">
            <div class="fles flex-col justify-center">
                {{-- username --}}
                <h3 class="text-[#858585] font-albertSans text-[13px]">Name</h3>
                <h1 class="text-[#000000] text-[15px] font-albertSans mt-1">{{$orders->username}}</h1>
            </div>
            <div class="flex flex-col justify-center">
                {{-- address --}}
                <h3 class="text-[#858585] font-albertSans text-[13px]">Address</h3>
                <h1 class="text-[#000000] text-[15px] font-albertSans mt-1 ">{{$orders->user->address}}</h1>
            </div>
        </div>
        <div class="flex flex-col ml-2 mt-5 gap-13">
            <div class="fles flex-col justify-center">
                {{-- gender --}}
                <h3 class="text-[#858585] font-albertSans text-[13px]">Gender</h3>
                <h1 class="text-[#000000] text-[15px] font-albertSans mt-1">{{$orders->user->gender}}</h1>
            </div>
            <div class="fles flex-col justify-center">
                {{-- email --}}
                <h3 class="text-[#858585] font-albertSans text-[13px]">Email</h3>
                <h1 class="text-[#000000] text-[15px] font-albertSans mt-1">{{$orders->user->email}}</h1>
            </div>
        </div>
        <div class="flex flex-col mt-5 mr-13">
            {{-- Birthdate --}}
            <h3 class="text-[#858585] font-albertSans text-[13px]">Birth Date</h3>
            <h1 class="whitespace-nowrap text-[#000000] text-[15px] font-albertSans mt-1">{{$orders->user->birthdate?->format('d M Y')}}</h1>
        </div>
    </div>
    {{-- Edit Tasklist  --}}
    <hr class="flex self-center w-[853px] items-center ">
    <div class="flex flex-col justify-center">
        <div class="flex justify-between">
            <div class="flex flex-col ml-15 mt-5">
                <h3 class="text-[#4B2C2C] font-albertSans text-[20px] mb-2">Edit Tasklist</h3>
                <div class="flex gap-10">
                    <div class="flex flex-col">
                        <p class="text-[#858585] font-albertSans text-[15px]">Product: {{$orders->visual}}</p>
                        <p class="text-[#858585] font-albertSans text-[15px]">Area: {{$orders->area}}m</p>
                    </div>
                    <div class="w-[2px] hr-[10px] bg-[#3b2c2c8d]"></div>
                    <div class="flex flex-col">
                        <p class="text-[#858585] font-albertSans text-[15px]">Category: {{$orders->category}}</p>
                        <p class="text-[#858585] font-albertSans text-[15px]">Type: {{$orders->typeOfBuilding}}</p>
                    </div>
                </div>
            </div>
            @if(session('error'))
            <div class="mr-10 mt-5">
                <div class="inline-block bg-red-100 text-red-600 px-3 py-2 rounded text-sm font-albertSans align-center max-w-[300px]">
                    {{ session('error') }}
                </div>
            </div>
            @endif
            {{-- <div class="flex mr-25 mt-5 gap-4">
                <a href="">
                    <div class="bg-[#4B2C2C] py-1 px-3 rounded-[4px] hover:bg-[#603a3a]">
                        <img src="{{ asset('assets/trash_white.svg') }}" alt="" class="w-[27px] h-[27px] ">
                    </div>
                </a>
            </div> --}}
        </div>
        <div class="mt-6 grid grid-rows-3 grid-flow-col">
        @forelse ($orders->tasklists as $task)
            <div class="flex gap-3 ml-10 mt-3">
                <form action="{{ route('admin.update.tasklist', $task->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="checkbox" class=" rounded-md border-2 border-solid bg-transparent w-5 h-5  border-[#4b2c2c] accent-[#4b2c2c]" onchange="this.form.submit()"
                        {{ $task->is_done ? 'checked' : '' }}>
                </form>
                <p class="{{ $task->is_done ? 'line-through text-gray-400' : '' }} font-albertSans text-[15px] ">
                    {{ $task->task_name }}
                </p>
                <form action="{{ route('admin.delete.tasklist', $task->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="">
                        <img src="{{ asset('assets/trash.svg') }}" alt="Delete">
                    </button>
                </form>
            </div>
        @empty
            
        @endforelse
            <div class="ml-15 mt-3">
            {{-- udah selesai!! --}}
                @if ($orders->tasklists->count() < 9)
                    <form action="{{ route('admin.add.tasklist', $orders->id) }}" method="POST" class="flex gap-2">
                        @csrf   
                        <input type="text" name="task_name" placeholder="New Tasklist..." class="px-2 py-1 border rounded placeholder-[#5a3e3e66] placeholder:text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <button type="submit" class="">
                            <img src="{{ asset('assets/check.svg') }}">
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection