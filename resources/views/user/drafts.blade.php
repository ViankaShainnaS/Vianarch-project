@extends ('profile')

@section('content')
  <main class="w-3/4 p-6">
    <div class=" bg-[#54382E] w-[780px] h-[640px] rounded-[5px] overflow-y-auto">
        <div class="absolute w-[760px] p-10 py-10 flex gap-3 bg-[#54382E]">
            <img src="{{ asset('assets/drafts.svg') }}" alt="Drafts Icon" class="">
            <h1 class="text-[#F3F3F3] font-albertSans text-[15px]">Drafts</h1>
        </div>
    
    <div class="grid grid-cols-2 grid-row-2 p-7 mt-20 gap-6">
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
                <div class="flex justify-between mt-5 text-sm">
                     {{-- button --}}
                    {{-- <div class="bg-[#54382E] w-fit h-fit px-4 flex py-1 items-center justify-center rounded-[2px]">
                        <span class="text-sm font-albertSans text-center text-[#F4DCCE]">Reorder</span>
                    </div>
                    <div class="border-[#54382E] border-1 w-fit h-fit px-4 flex py-1 items-center justify-center rounded-[2px]">
                        <span class="text-sm font-albertSans text-center text-[#54382E]">View Details</span>
                    </div> --}}
                        <form action="{{ route('user.drafts.delete', $order->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="text-blue-600 hover:underline cursor-pointer">Delete</button>
                        </form>
                        <form action="{{ route('user.drafts.checkout', $order->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="text-blue-600 hover:underline cursor-pointer">Checkout</button>
                        </form>
                        <a href="{{ route('user.drafts.edit', $order->id) }}" class="text-blue-600 hover:underline">
                            Edit
                        </a>
                </div>
            </div>
    
     @empty
    <div class="flex justify-center items-center w-[550px] h-fit">
        <p class="text-gray-400 text-[15px] font-albertSans justify-center ml-40">Nothing to Checkout</p>
    </div>
    @endforelse
    </div>
    </div>
</main>
@endsection
