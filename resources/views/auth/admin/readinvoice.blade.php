@extends('layouts.adminlayout')

@section('title')
ALL INVOICES
@endsection

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/readinvoice.css')}}">
@endsection

@section('maincontent')
        <h3>All Issued Invoices</h3>
        @if(session()->has('err_message'))
    <div class="alert alert-danger">
        {{ session('err_message') }}
    </div>
    @endif
            <ol>
                @foreach ($invoices as $invoice)
                <li class="invoice-item">
                    <div class="invoice-details">
                    <p><b>Invoice Number:</b> {{ $invoice->invoice_number }} &nbsp </p>
                    <a href="{{ route('invoicePageView', ['id' => $invoice->invoice_number]) }}">View</a>
                     &nbsp &nbsp
                      <a href="{{ route('invoice.updateget', ['id' => $invoice->invoice_number]) }}">Update</a>&nbsp &nbsp
                       <a href="{{ route('invoice.addItem', ['id' => $invoice->invoice_number]) }}">Add-Items</a>&nbsp &nbsp
                      <a href="{{ route('allocatIndex', ['id' => $invoice->invoice_number]) }}">Allocate</a>&nbsp &nbsp
                      <form action="{{ route('invoice.delete') }}" method="POST">
                        @csrf
                        <input type="hidden" name="invoice_no" value="{{ $invoice->invoice_number }}">
                        <button type="submit">Remove</button>
                        </form>
                    </div>
                </li>
                @endforeach
            </ol>
        <a href="{{ route('admin.home') }}" class="back-link">BACK</a>
@endsection
