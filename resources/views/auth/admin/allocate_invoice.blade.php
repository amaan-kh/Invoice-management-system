@extends('layouts.adminlayout')

@section('title')
INVOICE SHARING
@endsection

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/allocateinvoice.css')}}">
@endsection

@section('maincontent')
    <h3>Invoice Sharing</h3>
    <div class="container">
        <div class="data">
            <form action="{{ route('allocate') }}" method="POST">
                @csrf
                <div class="userdata">
                    <label for="name">Username<span class="required">*</span>:</label><br>
                    <select id="dropdown-select-name" name="name" required>
                        <option disabled selected>Select a username</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->name }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    <br><br>
                    
                    <label for="invoice_number">Invoice Number<span class="required">*</span>:{{$invoice->invoice_number}}</label><br>
                    <input type="hidden" name="invoice_number" value="{{$invoice->invoice_number}}" required>
                    <br>
                    <span>@if(isset($err_message))
                        <div class="alert alert-danger">
                            {{ $err_message }}
                        </div>
                    @endif
                    </span>
                    <br>    
                    <button type="submit">Share </button>
                </div>
            </form>
        </div>
        <br>
    </div>
    <a href="{{ route('invoice.index') }}" id="back">Back to panel</a>
@endsection
