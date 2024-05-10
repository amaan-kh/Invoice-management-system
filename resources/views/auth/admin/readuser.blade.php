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
        
                   
                   
                   
                      <form action="{{ route('user.delete') }}" method="POST">
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
            // Display confirmation dialog
            var confirmation = alert("Are you sure you want to delete this user?");
            if (confirmation) {
                // If user confirms, submit the form
                document.getElementById('deleteForm_' + userId).submit();
            }
            else{

            }
        }
         document.querySelectorAll('#forms').forEach(form => {
            form.addEventListener('submit', function(event) {
                event.preventDefault();
            });
        });
    </script>
@endsection