<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/tailwind.css') }}" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <title>Add Product</title>
</head>
<body class="bg-gradient-to-b from-[#FFF1E0] from-60% to-[#4B2C2C] to-99% h-screen flex justify-center items-center">
    <div class="w-1/2 bg-[#3b2c2c] p-8 rounded-[5px]">
        <h1 class="text-[#F4DCCE] font-albertSans text-[20px] mb-6">Add New Product</h1>
        <form action="{{ isset($product)
            ? route('admin.products.update', $product->id)
            : route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-4">
        @csrf
        @if(isset($product))
            @method('PUT')
        @endif
            <div>
                <label for="name" class="text-[#F4DCCE] font-albertSans text-[15px]">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $product->name ?? '') }}" class="w-full p-2 rounded-[5px] text-[#F4DCCE] border-1 border-solid border-[#F4DCCE] mt-2" {{ !isset($product) ? 'required' : '' }} >
            </div>
            <div>
                <label for="description" class="text-[#F4DCCE] font-albertSans text-[15px]">Description</label>
                <input type="text" name="description" id="description" value="{{ old('description', $product->description ?? '') }}" class="w-full p-2 rounded-[5px] text-[#F4DCCE] border-1 border-solid border-[#F4DCCE] mt-2" {{ !isset($product) ? 'required' : '' }}>
            </div>
            <div>
                <label for="imageLink" class="text-[#F4DCCE] font-albertSans text-[15px]">Image</label>
                <input type="file" name="imageLink" id="imageLink" class="w-full p-2 rounded-[5px] text-[#F4DCCE] border-1 border-solid border-[#F4DCCE] mt-2" {{ !isset($product) ? 'required' : '' }}>
            </div>
            @if(isset($product) && $product->imageLink)
                <img src="{{ asset('storage/'.$product->imageLink) }}" width="120">
            @endif

            <button type="submit" class="bg-[#f4dcce] text-[#3b2c2c] px-4 py-2 rounded-[5px] hover:bg-transparent hover:border-1 border-solid border-[#F4DCCE] hover:text-[#F4DCCE] transition-all duration-300 mt-10">
                {{ isset($product) ? 'Update Product' : 'Create Product' }}
            </button>
        </form>
    </div>
</body>
{{-- <form
    action="{{ isset($product)
        ? route('admin.products.update', $product->id)
        : route('admin.products.store') }}"
    method="POST"
    enctype="multipart/form-data">

    @csrf
    @if(isset($product))
        @method('PUT')
    @endif

    <label>Name</label>
    <input type="text" name="name"
    value="{{ old('name', $product->name ?? '') }}"
    {{ !isset($product) ? 'required' : '' }}>

    <label>Description</label>
    <input type="text" name="description"
    value="{{ old('description', $product->description ?? '') }}"
    {{ !isset($product) ? 'required' : '' }}>

    <label>Image</label>
    <input type="file" name="imageLink" {{ !isset($product) ? 'required' : '' }}>

    @if(isset($product) && $product->imageLink)
        <img src="{{ asset('storage/'.$product->imageLink) }}" width="120">
    @endif

    <button type="submit">
        {{ isset($product) ? 'Update Product' : 'Create Product' }}
    </button>
</form> --}}
