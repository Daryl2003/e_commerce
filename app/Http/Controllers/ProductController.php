<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all products from the database
        $products = Product::all();
        // Pass products to the index view
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Show the form for creating a new product
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'product_name' => 'required|min:3|unique:products',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048'
        ]);

        // Handle file upload if present
        $filePath = $request->hasFile('image') ? $request->file('image')->store('product_images', 'public') : null;

        // Create a new product record in the database
        Product::create([
            'product_name' => $request->product_name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $filePath
        ]);

        // Redirect to the product list with a success message
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        // Show the details of a specific product
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        // Show the form for editing a specific product
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // Validate the request data
        $request->validate([
            'product_name' => 'required|min:3|unique:products,product_name,' . $product->id,
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048'
        ]);

        // Handle file upload if present
        if ($request->hasFile('image')) {
            $filePath = $request->file('image')->store('product_images', 'public');
            $product->image = $filePath;
        }

        // Update the product record in the database
        $product->update($request->only(['product_name', 'description', 'price', 'stock']));

        // Redirect to the product list with a success message
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Delete the product record from the database
        $product->delete();

        // Redirect to the product list with a success message
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
