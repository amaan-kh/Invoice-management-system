@extends('layouts.adminlayout')

@section('title')
    SHARED INVOICES
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('css/readallocations.css') }}">
@endsection

@section('maincontent')
    <h3>All Shared Invoices</h3>
    <div class="container">
        <div class="invoice-list">
            <div class="user-list">
                <ol>
                    @foreach($dataArray as $key => $values)
                    <li class="invoice-item">
                        <div class="list-items"><div><b>User:</b> {{ $key }}</div>     
                        <div><b> &nbsp Invoice:</b>
                            @foreach($values as $value)
                            <span>{{ $value }} &nbsp</span>
                            @endforeach
                        </div>
                    </div>
                </li>
                @endforeach
            </ol>   
        </div>          
    </div>
</div>
<a href="{{ route('admin.home') }}" class="back-link">Back to Panel</a>
@endsection
