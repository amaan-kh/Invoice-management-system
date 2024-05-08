@extends('layouts.adminlayout')


@section('title')
ALL USERS
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('css/readuser.css') }}">
@endsection

@section('maincontent')
    <div class="container">
        <h1>All Current Users</h1>
        <div class="user-list">
            <h3>Admins</h3>
            <ul>
                @foreach ($admin_users as $user)
                <li>
                    <p>{{ $user->name }}</p>
                    
                </li>
                @endforeach
            </ul>
        </div>
        <div class="user-list">
            <h3>Users</h3>
            <ul>
                @foreach($non_admin_users as $user)
                <li>
                    <p>{{ $user->name }}</p>
                    &nbsp 
                      <form action="{{ route('user.delete') }}" method="POST">
                        @csrf
                        <input type="hidden" name="username" value="{{ $user->name }}">
                        <button type="submit">Remove</button>
                        </form>
                </li>
                @endforeach
            </ul>	
        </div>	
        <div class="back-button">
            <a href="{{ route('admin.home') }}" id="back">BACK</a>
        </div>
    </div>
@endsection
