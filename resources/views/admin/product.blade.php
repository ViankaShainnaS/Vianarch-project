@extends('admin.adminMenu')

@section('content')
<div class="w-[933px] h-[770px] p-5 border-2 border-[#5D3E3E] rounded-[10px] bg-gradient-to-b from-[#C49E6C]/10 from-30% to-[#FFF5E8] to-100%">
    <p class="m-3 text-[#5D3E3E] font-albertSans text-[18px]">Welcome back, admin</p>
    <h1 class="font-libreBodoni italic text-[40px] ml-3">Category Product</h1>

    @if(session('info'))
        <div>{{ session('info') }}</div>
    @endif

    @if (Session::has('success'))
            <div class="text-green-500 text-center mb-3">
                {{ Session::get('success') }}
            </div>
        @endif
        <div class="px-1">
        <div class="mt-10 ">
        <div class="flex font-albertSans bg-[#D1B693] text-center rounded-[5px]">
            <div class="py-3 w-[50px]  font-semibold">Id</div>
            <div class="py-3 w-[240px]  font-semibold">Product Name</div>
            <div class=" py-3 w-[280px]  font-semibold">Description</div>
            <div class="py-3 w-[240px]  font-semibold">Image Link</div>
        </div>


        <div class="mt-5">
            @forelse($products as $product)
                <div class="flex text-center rounded-[5px] mb-3 bg-[#F5DFC5]">
                    <div class="py-3 w-[50px] place-self-center">{{ $product->id }}</div>
                    <div class="py-3 w-[240px] place-self-center"> {{ $product->name }}</div>
                    <div class="py-3 w-[280px] place-self-center">{{ $product->description }}</div>
                    <div class="py-3 w-[240px]"><img src="{{ asset('storage/'.$product->imageLink) }}" class="justify-self-center" width="120"></div>

                    <div class="flex gap-2 ml-[-3px]">
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="p-0 place-self-center"><img src={{ asset('assets/edit.png') }}></a>

                        {{-- <form action="{{ route('admin.products.delete', $product->id) }}"
                              method="POST"
                              style="display:inline;"
                              class="place-self-center">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="py-3"><img src={{ asset('assets/delete.png') }}></button>
                        </form> --}}
                        <a href="{{ route('admin.products.delete', $product->id) }}" class="place-self-center"><img src={{ asset('assets/trash.svg') }}></a>
                        </div>
                        </div>
                    </div>
            @empty
                <div>
                    <div colspan="5">No products available.</div>
                </div>
            @endforelse
            </div>
        <button onclick="location.href='{{ route('admin.products.create') }}'" class="p-2 rounded-[5px] flex w-fit h-fit border-2 text-[15px] border-choco justify-end hover:bg-choco hover:text-creme transition ease-in-out duration-500">Add New Product</button>
</div>
@endsection
