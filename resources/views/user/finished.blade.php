@extends ('profile')

@section('content')
  <main class="w-3/4 p-6">
    <div class=" bg-[#54382E] w-[780px] h-[640px] rounded-[10px] overflow-y-auto">
        <div class="absolute w-[760px] p-10 py-10 flex gap-3 bg-[#54382E]">
            <img src="{{ asset('assets/finished.svg') }}" alt="Finished Icon" class="">
            <h1 class="text-[#F3F3F3] font-albertSans text-[15px]">Finished</h1>
        </div>
        <div class="grid grid-cols-2 grid-row-2 gap-7 p-5 mt-25">
           @forelse ($orders as $order)
            <div class="bg-[#F4DCCE] p-6 w-[300px] flex flex-col rounded-[5px] gap-4 ml-8">
                {{-- finished card --}}
                <div class="text-[#54382E] font-ebGaramond font-bold text-4xl text-center">
                    {{-- judul --}}
                    <h2>{{$order->typeOfBuilding}}</h2>
                </div>
                <div class="flex gap-5 justify-center items-center">
                     {{-- desc --}}
                    <div class="flex flex-col text-[15px] font-albertSans text-[#917D73]">
                        <p>Visual</p>
                        <p>Category</p>
                        <p>Area</p>
                    </div>
                    <div class="flex flex-col text-[15px] font-albertSans text-[#54382E]">
                        <p>: {{$order->visual}}</p>
                        <p>: {{$order->category}}</p>
                        <p>: {{$order->area}}<span>m2 </span></p>
                    </div>
                </div>
                <div class="flex justify-between mt-5">
                     {{-- button --}}
                    <a href="{{ route('user.order') }}">
                        <div class="bg-[#54382E] hover:bg-[#F4DCCE] text-[#F4DCCE] hover:text-[#54382E] hover:border-1 border-solid border-[#3b2c2c] transition-all duration-300 w-fit h-fit px-4 flex py-1 items-center justify-center rounded-[2px]">
                            <span class="text-sm font-albertSans text-center">Reorder</span>
                        </div>
                    </a>
                    <a href="{{ route('finished.details', $order->id) }}">
                        <div class="border-[#54382E] bg-transparent hover:bg-[#54382E] hover:border-[#F4DCCE] text-[#54382E] hover:text-[#F4DCCE] transition-all duration-300 border-1 w-fit h-fit px-4 flex py-1 items-center justify-center rounded-[2px]">
                            <span class="text-sm font-albertSans text-center">View Details</span>
                        </div>
                    </a>
                </div>
            </div>
           @empty
            <div class="flex justify-center items-center w-[550px] h-fit">
                <p class="text-gray-400 text-[15px] font-albertSans justify-center ml-40">Nothing was finished yet.</p>
            </div>
           @endforelse
        </div>
    </div>
</main>
@endsection
