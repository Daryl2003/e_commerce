@extends('layouts.app')

@section('content')
    <h1>Product List</h1>
    <a href="{{ route('products.create') }}">Create New Product</a>
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif
    <ul>
        @foreach($products as $product)
            <li>
                @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{$product->product_name}}" width="100">
                @endif
                {{ $product->product_name }} - {{ $product->price }}
                <a href="{{ route('products.edit', $product->id) }}">Edit</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
<header>
    
</header>
<form action="{{ route('products.index') }}" method="GET">
    <input type="text" name="search-box" placeholder="Search products...">
    <button type="submit">Search</button>
</form>