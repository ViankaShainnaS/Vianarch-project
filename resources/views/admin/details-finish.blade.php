@extends('admin.adminMenu')

@section('content')
<div class="flex flex-col w-[933px] max-h-[770px] p-5 border-2 border-[#5D3E3E] rounded-[10px] bg-gradient-to-b from-[#C49E6C]/10 from-30% to-[#FFF5E8] to-100%">
        {{-- header --}}
    <div>
        <p class="m-3 text-[#5D3E3E] font-albertSans text-[18px] font-medium">Welcome back, admin</p>
        <h1 class="font-libreBodoni italic text-[50px] ml-3 text-[#5D3E3E]">Dashboard</h1>
    </div>
    {{-- back button --}}
    <div class="mt-5">
        <a href="{{ route('admin.dashboard') }}" class="flex gap-3 m-2">
            <img src="{{ asset('assets/arrow-back.svg') }}" class="w-[27px]" alt="">
            <p class="mt-1 font-albertSans text-[18px]">Edit Progress</p>
        </a>
    </div>

    {{-- biodata section --}}
    <div class="flex gap-6">
        <div class="flex flex-col items-center m-10">
            <h1 class="text-[20px] font-albertSans text-[#000000] font-semibold text-center mb-1">{{$order->user->name}}</h1>
            <h3 class="font-albertSans font-light text-[15px] mb-3">{{$order->phone_number}}</h3>
            <a href="https://wa.me/62{{ $order->phone_number }}" target="_blank">
                <div class="flex w-[137px] h-[36px] bg-[#5d3e3e] rounded-[3px] p-2 items-center text-[#ffffff] justify-center hover:bg-transparent border-2 border-solid border-[#5d3e3e] hover:text-[#5d3e3e] transition-all ease-in-out duration-300">
                    <p class="text-[15px] font-albertSans">Send Message</p>
                </div>
            </a>
        </div>
        <div class="flex flex-col ml-2 mt-5 gap-13">
            <div class="fles flex-col justify-center">
                {{-- username --}}
                <h3 class="text-[#858585] font-albertSans text-[13px]">Name</h3>
                <h1 class="text-[#000000] text-[15px] font-albertSans mt-1">{{$order->username}}</h1>
            </div>
            <div class="flex flex-col justify-center">
                {{-- address --}}
                <h3 class="text-[#858585] font-albertSans text-[13px]">Address</h3>
                <h1 class="text-[#000000] text-[15px] font-albertSans mt-1 ">{{$order->user->address}}</h1>
            </div>
        </div>
        <div class="flex flex-col ml-2 mt-5 gap-13">
            <div class="fles flex-col justify-center">
                {{-- gender --}}
                <h3 class="text-[#858585] font-albertSans text-[13px]">Gender</h3>
                <h1 class="text-[#000000] text-[15px] font-albertSans mt-1">{{$order->user->gender}}</h1>
            </div>
            <div class="fles flex-col justify-center">
                {{-- username --}}
                <h3 class="text-[#858585] font-albertSans text-[13px]">Email</h3>
                <h1 class="text-[#000000] text-[15px] font-albertSans mt-1">{{$order->email}}</h1>
            </div>
        </div>
        <div class="flex flex-col mt-5 mr-13">
            {{-- Birthdate --}}
            <h3 class="text-[#858585] font-albertSans text-[13px]">Birth Date</h3>
            <h1 class="whitespace-nowrap text-[#000000] text-[15px] font-albertSans mt-1">{{$order->user->birthdate?->format('d M Y')}}</h1>
        </div>
    </div>
</div>
@endsection