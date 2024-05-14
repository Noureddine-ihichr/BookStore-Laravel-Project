
@extends('layouts.app')

@section('title', 'Search')

@section('content')
<div class="heading">
    <h3>Search</h3>
    <p><a href="{{ route('home') }}">Home</a> / Search</p>
</div>

<section class="search-form">
    <form action="{{ route('search') }}" method="post">
        @csrf
        <input type="text" name="search" placeholder="Search products..." class="box">
        <input type="submit" value="Search" class="btn">
    </form>
</section>
@endsection
