<!-- resources/views/admin/orders/index.blade.php -->

@include('admin.admin_header')

@extends('layouts.admin')

@section('title', 'Placed Orders')

@section('content')
<section class="orders">
    <h1 class="title">Placed Orders</h1>

    <div class="box-container">
        @if ($orders->isEmpty())
            <p class="empty">No orders placed yet!</p>
        @else
            @foreach ($orders as $order)
                <div class="box">
                    <p>User ID: <span>{{ $order->user_id }}</span></p>
                    <p>Placed On: <span>{{ $order->placed_on }}</span></p>
                    <p>Name: <span>{{ $order->name }}</span></p>
                    <p>Number: <span>{{ $order->number }}</span></p>
                    <p>Email: <span>{{ $order->email }}</span></p>
                    <p>Address: <span>{{ $order->address }}</span></p>
                    <p>Total Products: <span>{{ $order->total_products }}</span></p>
                    <p>Total Price: <span>${{ $order->total_price }}/-</span></p>
                    <p>Payment Method: <span>{{ $order->method }}</span></p>

                    <form action="{{ route('admin.orders.update', $order->id) }}" method="post">
                        @csrf
                        <select name="update_payment">
                            <option value="" selected disabled>{{ $order->payment_status }}</option>
                            <option value="pending">Pending</option>
                            <option value="completed">Completed</option>
                        </select>
                        <input type="submit" value="Update" name="update_order" class="option-btn">
                    </form>

                    <a href="{{ route('admin.orders.delete', $order->id) }}"
                       onclick="return confirm('Delete this order?');" class="delete-btn">Delete</a>
                </div>
            @endforeach
        @endif
    </div>
</section>
@endsection
