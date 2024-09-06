@extends('layouts.app')

@section('content')
    <h1>Edit Product</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label for="product_name">Product Name</label>
            <input type="text" name="product_name" id="product_name" value="{{ old('product_name', $product->product_name) }}" required>
        </div>

        <div>
            <label for="price">Price</label>
            <input type="text" name="price" id="price" value="{{ old('price', $product->price) }}" required>
        </div>

        <div>
            <label for="stock">Stock</label>
            <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock) }}" required>
        </div>

        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description">{{ old('description', $product->description) }}</textarea>
        </div>

        <div>
            <label for="image">Product Image</label>
            <input type="file" name="image" id="image">
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{$product->product_name}}" width="100">
            @endif
        </div>

        <button type="submit">Update Product</button>
    </form>
@endsection
