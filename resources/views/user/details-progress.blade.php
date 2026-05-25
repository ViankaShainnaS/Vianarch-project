@extends ('profile')

@section('content')
  <main class="p-6">
    <div class="flex flex-col bg-[#54382E] w-[780px] h-[640px] rounded-[5px] mt-7 ">
        <a href="{{ route('progress') }}" class="w-[760px] p-10 py-10 flex gap-3">
            <img src="{{ asset('assets/arrow-back-white.svg') }}" alt="">
            <h1 class="text-[#F3F3F3] font-albertSans text-[15px] mt-1">Progress Details</h1>
        </a>
            {{-- detail order --}}
        <div class="flex ml-[-30px] mt-5 gap-10 justify-center items-start">
            <div class="flex flex-col gap-3 text-[20px] font-albertSans text-[#a7a7a7]">
                <p>Product</p>
                <p>Building Category</p>
                <p>Area</p>
                <p>Current Tasklist</p>
            </div>
            <div class="flex flex-col gap-3 text-[20px] font-albertSans text-[#F3F3F3]">
                <p>: {{ $order->visual }}</p>
                <p>: {{ $order->category }}</p>
                <p>: {{ $order->area }}</p>
                <p>: {{ optional($tasklists)->first()->task_name ?? 'No active tasklist' }}</p>
            </div>
        </div>
        <hr class="flex w-[700px] h-[2px] self-center bg-[#ffffff2e] mt-15">
        {{-- tasklist --}}
        <div class="flex-col max-w-[780px] gap-3 mt-6">
            <div class="flex-col ml-10">
                <h2 class="text-[#F3F3F3] font-albertSans text-[20px] mt-1">Tasklist</h2>
                <p class="font-albertSans text-[13px] text-[#ffffff88]">You can see the progress of each task in the list below.</p>
            </div>
            <div class="grid grid-rows-3 grid-flow-col gap-4 ml-15 mt-5">
                @forelse ($order->tasklists as $task)
                    <div class="flex items-center gap-3 text-[#F3F3F3] font-albertSans text-[15px]">
                        <div class="w-5 h-5 rounded-sm border border-white/30 flex items-center justify-center">
                            @if ($task->is_done)
                                <span class="text-white text-xs">✓</span>
                            @endif
                        </div>
                        <span>{{ $task->task_name }}</span>
                    </div>
                @empty
                    <p class="text-[#F3F3F3]">No tasklist available.</p>
                @endforelse
            </div>
         </div>
    </div>
</main>
@endsection