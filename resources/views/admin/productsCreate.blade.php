<form
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
</form>
