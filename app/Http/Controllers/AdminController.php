<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Products;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Log;
use Illuminate\Support\Facades\DB;



class AdminController extends Controller{

    public function __construct()
    {

        $this->middleware([ 'admin', 'prevent-back' ]);
    }

    public function onProgress(){
        //logic for manage onProgress section

    }

    public function finished(){
        //logic for manage finished section

    }

    public function showProducts(){
        $products = Products::all();

    // cek kalau kosong
    if ($products->isEmpty()) {
        return redirect()->route('admin.products.create')->with('info', 'Belum ada data. Silakan tambahkan produk.');
    }

    return view('admin.product', compact('products'));
    }

    public function createProduct(){
           return view('admin.productsCreate');

    }

    // Pastikan kamu menggunakan use Illuminate\Support\Facades\Storage;

public function updateProduct(Request $request, $id)
{
    $product = Products::findOrFail($id);

    $validated = $request->validate([
        // 1. `sometimes` & `nullable`: Field hanya divalidasi jika ada di request,
        // dan jika ada, boleh kosong (nullable) tapi harus string dan max 255/500.
        'name' => 'sometimes|nullable|string|max:255',
        'description' => 'sometimes|nullable|string|max:500',

        // 2. imageLink: Hanya di-upload jika ada file baru
        'imageLink' => 'nullable|image|mimes:jpg,jpeg,png|max:4096'
    ]);


    if ($request->hasFile('imageLink')) {
        // Hapus gambar lama jika ada
        if ($product->imageLink) {
            Storage::disk('public')->delete($product->imageLink);
        }

        $path = $request->file('imageLink')->store('products', 'public');
        $validated['imageLink'] = $path;
    }
    // Jika tidak ada file baru, 'imageLink' tidak perlu di-set atau di-unset
    // karena kita hanya menggunakan data dari $validated.

    // 3. Update data
    $product->update($validated);

    return redirect()->route('admin.products')->with('success', 'Product updated successfully!');
}

//     public function updateProduct(Request $request, $id)
// {
//     $validated = $request->validate([
//          'name' => 'nullable|string|max:255',
//         'description' => 'nullable',
//         'imageLink' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
//     ]);

//     // Ambil data kategori berdasarkan ID
//     $category = Products::findOrFail($id);
//     // user upload gambar baru
//     if ($request->hasFile('imageLink')) {
//         $path = $request->file('imageLink')->store('products', 'public');
//         $validated['imageLink'] = $path;
//     } else {
//         // Kalo user gak upload, biarin imageLink lama
//         unset($validated['imageLink']);
//     }

//     // Update data
//     $category->update($validated);
//     return redirect()->route('admin.products')->with('success', 'Category updated successfully!');
// }

    public function storeProduct(Request $request){

    $validation = $request->validate([
        'name' => 'required|string',
        'description' => 'required|string',
        'imageLink' => 'required|image|mimes:jpg,jpeg,png|max:30000'
    ]);

    $path = $request->file('imageLink')->store('products', 'public');

    // $product = new Products();
    // $product->name = $request->name;
    // $product->description = $request->description;

    // // Kalo ada gambar, ya disimpen
    // if ($request->hasFile('imageLink')) {
    //     // Nyimpen ke storage/app/public/products
    //     $path = $request->file('imageLink')->store('products', 'public');

    //     $product->imageLink = $path;
    // }

    // $product->save();
    // $data = [
    //     'name' => $validation['name'],
    //     'description' => $validation['description'],
    //     'imageLink' => $path
    // ];

    // Products::create($data);

    // DB::enableQueryLog();
    //     Products::create($validation + ['imageLink' => $path]);
    //     dd(DB::getQueryLog());

    //     Products::create($validation + ['imageLink' => $path]);

    $validation['imageLink'] = $request->file('imageLink')->store('products', 'public');
    Products::create($validation);

    return redirect()->route('admin.products')->with('success', 'Product created successfully!');
}



//     public function storeProduct(Request $request)
// {
//     // Validasi dulu
//     $validated = $request->validate([
//         'name' => 'required|string',
//         'description' => 'required|max:20',
//         'imageLink' => 'required|image|mimes:jpg,jpeg,png|max:2048'
//     ]);

//     // Cek nama produk kembar
//     if (Products::where('name', $validated['name'])->exists()) {
//         return back()->with('error', 'Product name already taken!');
//     }

//     // Upload gambar
//     $path = $request->file('imageLink')->store('products', 'public');

//     // Simpan data
//     Products::create($validated);

//     return view('admin.product')->with('success', 'Product created successfully!');
// }

    public function editProduct($id)
    //buat ambil data doang
    {
        $product = Products::findOrFail($id);
        return view('admin.productsCreate', compact('product'));
    }


    public function deleteProduct($id){

    $product = Products::findOrFail($id);
    $product->delete();

    return redirect()->route('admin.products')
        ->with('success', 'Product deleted successfully!');
    }
    public function portfolio(){
        return view('admin.portofolio');
    }
    public function experience(){
        //logic to get data from database, then show, then update

    }
}
