@extends('layouts.adminlayout')


@section('title')
ALL USERS
@endsection

@section('style')
<link rel="stylesheet" href="{{ asset('css/readuser.css') }}">
@endsection



@section('maincontent')

<div class="container ">
    <h4 id="heading">All Current Users</h4>
    <br>
    <div class="usercontainer">
        <div class="user-list">
            <h5>Admins</h5>
            <ul>
                @foreach ($admin_users as $user)
                <li>
                    <div class="admindetails">
                        <p>{{ $user->name }}</p>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="user-list">
            <h5>Users</h5>
            <ul>
                @foreach($non_admin_users as $user)
                <li>
                    <div class="userdetails">
                        <p> {{ $user->name }} </p> 
                        <div id="seplinks">

                            <a href="{{ route('user.update', ['name' => $user->name]) }}" class="btn btn-success" >Edit</a>
                            <form id="forms" action="{{ route('user.delete') }}" method="POST" id="deleteForm_{{$user->id}}"  onsubmit="return confirmDelete('{{ $user->id }}')">
                                @csrf

                                <input type="hidden" name="username" value="{{ $user->name }}">
                                <button type="submit" class="btn btn-danger" onclick="confirmDelete('{{ $user->id }}')">Remove</button>
                            </form>
                        </div>
                    </div>


                </li>
                <!-- <hr id="liine"> -->



                @endforeach
            </ul>	
        </div>    
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