<!-- resources/views/admin/users/index.blade.php -->
@include('admin.admin_header') 

@extends('layouts.admin')

@section('title', 'User Accounts')

@section('content')
<section class="users">
    <h1 class="title">User Accounts</h1>

    <div class="box-container">
        @foreach ($users as $user)
            <div class="box">
                <p>User ID: <span>{{ $user->id }}</span></p>
                <p>Username: <span>{{ $user->name }}</span></p>
                <p>Email: <span>{{ $user->email }}</span></p>
                <p>User Type: <span style="color: {{ $user->user_type == 'admin' ? 'var(--orange)' : 'inherit' }}">{{ $user->user_type }}</span></p>
                <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" onsubmit="return confirm('Delete this user?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-btn">Delete User</button>
                </form>
            </div>
        @endforeach
    </div>
</section>
@endsection
