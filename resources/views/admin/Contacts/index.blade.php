@include('admin.admin_header') 

@extends('layouts.admin')

@section('title', 'Messages')

@section('content')
    <section class="messages">
        <h1 class="title">Messages</h1>

        <div class="box-container">
            @if($messages->isEmpty())
                <p class="empty">You have no messages!</p>
            @else
                @foreach($messages as $message)
                    <div class="box">
                        <p>User ID: <span>{{ $message->user_id }}</span></p>
                        <p>Name: <span>{{ $message->name }}</span></p>
                        <p>Number: <span>{{ $message->number }}</span></p>
                        <p>Email: <span>{{ $message->email }}</span></p>
                        <p>Message: <span>{{ $message->message }}</span></p>
                        <form action="{{ route('admin.contacts.delete', $message->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Delete this message?')" class="delete-btn">Delete Message</button>
                        </form>
                    </div>
                @endforeach
            @endif
        </div>
    </section>
@endsection
