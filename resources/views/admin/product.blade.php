@extends('admin.adminMenu')

@section('content')
<div class="flex flex-col w-[933px] max-h-[770px] p-5 border-2 border-[#5D3E3E] rounded-[10px] bg-gradient-to-b from-[#C49E6C]/10 from-30% to-[#FFF5E8] to-100%">
    {{-- header --}}
    <div>
        <p class="m-3 text-[#5D3E3E] font-albertSans text-[18px]">Welcome back, admin</p>
        <h1 class="font-libreBodoni italic text-[40px] ml-3">Category Product</h1>
    </div>

    @if(session('info'))
        <div>{{ session('info') }}</div>
    @endif

    @if (Session::has('success'))
            <div class="text-green-500 text-center mb-3">
                {{ Session::get('success') }}
            </div>
        @endif
        {{-- scrolling section --}}
    <div class="px-1 overflow-y-auto flex-1 min-h-0">
        <div class="mt-10">
            <div class="grid grid-cols-5 font-albertSans bg-[#D1B693] text-center rounded-[5px]">
                <div class="py-3 font-semibold ">Id</div>
                <div class="py-3 font-semibold ">Product Name</div>
                <div class="py-3 font-semibold ">Description</div>
                <div class="py-3 font-semibold ">Image Link</div>
            </div>


            <div class="mt-5">
                <div class="grid grid-cols-5 text-center rounded-[5px] mb-3 bg-[#F5DFC5]">
                @forelse($products as $product)
                    <div class="py-3 place-self-center">{{ $product->id }}</div>
                    <div class="py-3 place-self-center"> {{ $product->name }}</div>
                    <div class="py-3 place-self-center">{{ $product->description }}</div>
                    <div class="py-3 "><img src="{{ asset('storage/'.$product->imageLink) }}" class="justify-self-center" width="120"></div>

                    <div class="flex gap-2 ml-5">
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="p-0 place-self-center"><img src={{ asset('assets/edit.png') }}></a>

                        <form action="{{ route('admin.products.delete', $product->id) }}"
                            method="POST"
                            style="display:inline;"
                            class="place-self-center">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="py-3"><img src={{ asset('assets/trash.svg') }}></button>
                        </form>

                        {{-- <a href="{{ route('admin.products.delete', $product->id) }}" class="place-self-center"><img src={{ asset('assets/trash.svg') }}></a> --}}
                    </div>
            @empty
            <div>
                <div colspan="5">No products available.</div>
            </div>
            @endforelse
                </div>
            </div>
        </div>
    </div>
        {{-- footer --}}
    <div class="ml-10 mt-5 w-fit h-fit p-2 rounded-[5px  border-2 text-[15px] border-choco  hover:bg-choco hover:text-creme transition ease-in-out duration-500"> 
        <button onclick="location.href='{{ route('admin.products.create') }}'" class=>Add New Product</button>
    </div>
</div>
@endsection
