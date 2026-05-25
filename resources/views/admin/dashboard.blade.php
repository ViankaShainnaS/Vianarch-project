@extends('admin.adminMenu')

@section('content')
<div class="flex flex-col w-[933px] max-h-[770px] p-5 border-2 border-[#5D3E3E] rounded-[10px] bg-gradient-to-b from-[#C49E6C]/10 from-30% to-[#FFF5E8] to-100%">
        {{-- header --}}
    <div>
        <p class="m-3 text-[#5D3E3E] font-albertSans text-[18px]">Welcome back, admin</p>
        <h1 class="font-libreBodoni italic text-[50px] ml-3 text-[#5D3E3E]">Dashboard</h1>
    </div>
    <div class="h-1 mx-z10 bg-[#5D3E3E] mt-5 rounded-[5px]"></div>
    <div class="flex gap-2 mt-3 mb-5 ml-5">
        <div><img src="{{ asset('assets/progress-dark.svg') }}" alt="" class="w-[25px]"></div>
        <div class="text-[#5D3E3E] font-albertSans font-medium text-[19px]">
            <h2>Progressed</h2>
        </div>
    </div>
    <div class="overflow-x-scroll flex gap-4 px-5"> 
        @forelse($progressedOrders as $order)
           {{-- user & category --}}
           <div class="bg-[#FFF1E0] w-[260px] flex-shrink-0 border-2 border-solid border-[#5D3E3E] rounded-[5px] mb-8">
                <div class="flex-col text-center mt-4">
                    <h1 class="font-libreBodoni text-[#5D3E3E] text-[30px] font-bold">{{ $order->category }}</h1>
                    <p class="font-albertSans text-[#000000] opacity-30 text-[14px] mt-2">User: {{ $order->username}}</p>
                    <p class="font-albertSans text-[#000000] opacity-30 text-[14px]">Status: {{ $order->tasklists->first()?->task_name ?? 'N/A' }}</p>
                    <div class="flex justify-end text-[10px] font-albertSans underline-offset-1 underline mr-3 mt-5 pb-2 hover:text-[#4394FF]">
                        <a href="{{ route('admin.details.progress', $order->id) }}">see more</a>
                    </div>
                </div>
           </div>
        @empty
            <p>Tidak ada projek yang sedang berjalan.</p>
        @endforelse
    </div>
    <div class="h-1 mx-z10 bg-[#5D3E3E] mt-5 rounded-[5px]"></div>
    <div class="flex gap-2 mt-3 mb-5">
        <div><img src="{{ asset('assets/finished-dark.svg') }}" alt="" class="w-[25px]"></div>
        <div class="text-[#5D3E3E] font-albertSans font-medium text-[19px]">
            <h2>Finished</h2>
        </div>
    </div>
      <div class="overflow-x-auto flex gap-4 px-5 w-full"> 
        @forelse($finishedOrders as $order)
           {{-- user & category --}}
           <div class="bg-[#FFF1E0] w-[260px] flex-shrink-0 border-2 border-solid border-[#5D3E3E] rounded-[5px] mb-8">
                <div class="flex-col text-center mt-4">
                    <h1 class="font-libreBodoni text-[#5D3E3E] text-[30px] font-bold">{{ $order->category }}</h1>
                    <p class="font-albertSans text-[#000000] opacity-30 text-[14px] mt-2">User: {{ $order->username}}</p>
                    <p class="font-albertSans text-[#000000] opacity-30 text-[14px]">Finished at: {{ $order->finished_at }}</p>
                    <div class="flex justify-end text-[10px] font-albertSans underline-offset-1 underline mr-3 mt-5 pb-2 hover:text-[#4394FF]">
                        <a href="{{ route('admin.details.finished', $order->id) }}">see more</a>
                    </div>
                </div>
           </div>
        @empty
            <p class="text-center text-[15px] font-albertSans text-[#8d8d8d]">Tidak ada projek yang sedang berjalan.</p>
        @endforelse
    </div>
</div>
@endsection
