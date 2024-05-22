@extends('layouts.adminlayout')

@section('title')
ALL INVOICES
@endsection

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/readinvoice.css')}}">

@endsection

@section('maincontent')
        <h4>All Issued Invoices</h4>
        @if(session()->has('err_message'))
    <div class="alert alert-danger">
        {{ session('err_message') }}
    </div>
    @endif
            <ol>
                @foreach ($invoices as $invoice)
                <li class="invoice-item {{ $invoice->status == 'active' ? 'status-active' : ($invoice->status == 'pending' ? 'status-pending' : ($invoice->status == 'cancelled' ? 'status-cancelled' : '')) }}">
                    <div id="invoice-wrapper">
                    <div class="invoice-details">
                    <p><b>Invoice Number:</b> {{ $invoice->invoice_number }} &nbsp </p>
                    </div>
                    <div >
                        @if($invoice->transactionId && $invoice->status=='pending')
                        <p>Waiting approval</p>
                        @endif
                    </div>
                    <div class="invoice-details">
                    <a href="{{ route('invoicePageView', ['id' => $invoice->invoice_number]) }}">View</a> &nbsp &nbsp
                    <a href="{{ route('invoice.updateget', ['id' => $invoice->invoice_number]) }}">Update</a>&nbsp &nbsp
                    <a href="{{ route('invoice.addItem', ['id' => $invoice->invoice_number]) }}">Add-Items</a>&nbsp &nbsp
                    <a href="{{ route('allocatIndex', ['id' => $invoice->invoice_number]) }}">Allocate</a>&nbsp &nbsp
                    <form id="deleteForm_{{ $invoice->invoice_number }}" action="{{ route('invoice.delete') }}" method="POST" onsubmit="return confirmDelete('{{ $invoice->invoice_number }}')">
                        @csrf
                        <input type="hidden" name="invoice_no" value="{{ $invoice->invoice_number }}">
                        <button type="submit" >Remove</button>
                    </form>
                    </div>
                    </div>
                </li>
                @endforeach
            </ol>

{{ $invoices->links('vendor.pagination.bootstrap-4') }}
    <a href="{{ route('admin.home') }}" class="back-link">BACK</a>

@endsection

@section('scripts')
<script>
    function confirmDelete(invoiceNumber) {
        var confirmation = confirm("Are you sure you want to delete this invoice?");
        return confirmation;
    }
    
</script>
@endsection