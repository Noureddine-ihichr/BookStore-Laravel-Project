@extends('layouts.admin')

@section('content')
    <h1 class="title">Add Product</h1>

    <section class="add-products">
        <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" name="name" class="box" placeholder="Enter product name" required>
            <input type="number" min="0" name="price" class="box" placeholder="Enter product price" required>
            <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box" required>
            <input type="submit" value="Add Product" class="btn">
        </form>
    </section>
@endsection
