@extends ('profile')

@section('content')
  <main class="w-3/4 p-6">
    <div class=" bg-[#54382E] w-[780px] h-[640px] rounded-[5px] overflow-y-auto">
      <div class="absolute w-[760px] p-10 py-10 flex gap-3 bg-[#54382E]">
        <img src="{{ asset('assets/progress.svg') }}" alt="">
        <h1 class="text-[#F3F3F3] font-albertSans text-[15px]">On Progress</h1>
      </div>
      
      <div class="grid grid-cols-2 grid-row-2 p-7 mt-20 gap-6">
        @forelse ($orders as $order)
          <div class="bg-[#F4DCCE] p-6 w-[300px] flex flex-col rounded-[5px] gap-4 ml-8">
                {{-- progress card --}}
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
                <p>Status</p>
              </div>
              <div class="flex flex-col text-[15px] font-albertSans text-[#54382E]">
                <p>: {{$order->visual}}</p>
                <p>: {{$order->category}}</p>
                <p>: {{$order->area}}<span>m2 </span></p>
                <p>: {{$order->taskList}}</p>
              </div>
            </div>
            <div class="flex justify-between mt-5">
                     {{-- button --}}
              <a href="https://wa.me/6285842225735">
                <div class="bg-[#54382E] w-fit h-fit px-4 flex py-1 items-center justify-center rounded-[2px] hover:bg-transparent hover:border-1 border-solid border-[#3b2c2c] text-sm font-albertSans text-center text-[#F4DCCE] hover:text-[#3b2c2c] transition-all duration-300">
                  <span class="">Contact admin</span>
                </div>
              </a>
              <div>
                <a href="{{ route('progress.details', $order->id) }}">
                  <div class="border-[#54382E]  border-1 w-fit h-fit px-4 flex py-1 items-center justify-center rounded-[2px] hover:bg-[#54382E]  text-sm font-albertSans text-center text-[#54382E] hover:text-[#F4DCCE] transition-all duration-300">
                    <span class="">View Details</span>
                  </div>
                </a>
              </div>
            </div>
          </div>
        @empty
          
        @endforelse
      </div>
    </div>
</main>
@endsection
