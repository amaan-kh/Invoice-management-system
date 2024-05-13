@extends('layouts.adminlayout')


@section('title')
ALL USERS
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('css/readuser.css') }}">
@endsection

@section('maincontent')
    <div class="container">
        <h4>All Current Users</h4>
        <div class="user-list">
            <h5>Admins</h5>
            <ul>
                @foreach ($admin_users as $user)
                <li>
                    <p>{{ $user->name }}</p>
                    
                </li>
                @endforeach
            </ul>
        </div>
        <div class="user-list">
            <h5>Users</h5>
            <ul>
                @foreach($non_admin_users as $user)
                <li>
        
                   
                   
                   
                      <form id="forms" action="{{ route('user.delete') }}" method="POST" id="deleteForm_{{$user->id}}"  onsubmit="return confirmDelete('{{ $user->id }}')">
                        @csrf
                        <label> {{ $user->name }} </label> &nbsp &nbsp
                        <input type="hidden" name="username" value="{{ $user->name }}">
                         <button type="submit" onclick="confirmDelete('{{ $user->id }}')">Remove</button>
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

@section('scripts')
    <script>
        function confirmDelete(userId) {
            var confirmation = confirm("Are you sure you want to delete this user?");
            return confirmation;
        }
         
    </script>
@endsection