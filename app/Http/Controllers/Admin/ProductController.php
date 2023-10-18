<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function Index()
    { 
        $products = Product::all();
        return view('admin.products.allproducts',compact('products'));
    }
    public function AddProduct()
    {
        return view('admin.products.addproduct');
    }
    public function StoreProduct(Request $request)
{
    $validatedData = $request->validate([
        'references' => 'required|string',
        'usine' => 'required|string',
        'color' => 'required|string',
        'design' => 'required|string',
        'size' => 'required|string',
        'inQty' => 'required|integer',
        'outQty' => 'required|integer',
        'date' => 'required|date',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('product', 'public');
        $validatedData['image'] = $imagePath;
    }

    $status = $validatedData['inQty'] <= $validatedData['outQty'] ? 'Epuisé' : 'En Stock';

    // Add the status to the validated data
    $validatedData['status'] = $status;

    // Create a new product instance and populate it with the validated data
    $product = new Product($validatedData);

    $product->save();

    // Redirect back to the product list with a success message
    return redirect()->route('allproducts')->with('message', 'Product stored successfully');
}


    public function EditProduct ($id){
        $product = Product::findOrFail($id);
        return view ("admin/products/editproduct", compact('product'));
    }

    public function DeleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('allproducts')->with('message', 'Your Product has been deleted.');
    }
    public function UpdateProduct(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'references' => 'required|string',
            'usine' => 'required|string',
            'color' => 'required|string',
            'design' => 'required|string',
            'size' => 'required|string',
            'inQty' => 'required|integer',
            'outQty' => 'required|integer',
            'date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'

        ]);

        $product = Product::findOrFail($id);

        if ($request->hasFile('product')) {
            // Delete the previous logo if it exists
            if ($product->image) {
                // Use the instance of product to call the delete method
                Storage::delete('public/' . $product->image);
            }
            // Upload and store the new logo
            $imagePath = $request->file('product')->store('product', 'public');
            $validatedData['product'] = $imagePath;
        }
    
        // Handle logo deletion
        if ($request->has('delete_images')) {
            $imagePathToDelete = $request->input('delete_images');
            // Use the instance of product to call the delete method
            Storage::delete('public/' . $imagePathToDelete);
        }

        $status = $validatedData['inQty'] <= $validatedData['outQty'] ? 'Epuisé' : 'En Stock';

        // Add the status to the validated data
        $validatedData['status'] = $status;

        // Find the product by ID
        $product = Product::findOrFail($id);

        // Update the product with the validated data, including the status
        $product->update($validatedData);

        // Redirect back to the product list or a success page
        return redirect()->route('allproducts')->with('message', 'Product updated successfully');
    }
    public function ShowProduct($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.showproduct', compact('product'));
    }
}
