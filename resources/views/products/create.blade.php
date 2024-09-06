@extends('layouts.app')

@section('content')
    <h1>Create Product</h1>
    @if($errors->any())
        <div>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <input type="text" name="product_name" placeholder="Product Name">
        <input type="text" name="price" placeholder="Price">
        <input type="number" name="stock" placeholder="Stock">
        <button type="submit" style="margin-bottom:10px;">Create</button> <br>
        <textarea id="description" name="description" placeholder="Description" rows="4" cols="50"></textarea>
        
    </form>
@endsection
