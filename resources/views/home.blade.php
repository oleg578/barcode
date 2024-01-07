@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <div class="card">
                <div class="card-header">Print Barcode</div>
                <div class="card-body">
                    <p>Employee : {{ Auth::user()->pseudo }}</p>
                    <form id="barcodeForm" method="POST" action="{{ route('printaction')}}">
                        @csrf
                        <input type="hidden" name="employeepseudo" value="{{ Auth::user()->pseudo }}">
                        <div class="form-group">
                            <label for="printerName">Printer</label>
                            <select class="form-control" id="printerName" name="printername">
                                @foreach ($printers as $printer)
                                <option value="{{ $printer->name}}" @if ($printer->name===$currentprinter &&
                                    $printer->offline==false) selected
                                    @endif @if ($printer->offline) disabled @endif>
                                    {{ $printer->name }}
                                    @if ($printer->offline)
                                    <span>&nbsp;offline&nbsp;
                                        @php
                                        echo date_diff(date_create(), date_create($printer->offlinetime))->format('%h
                                        hours %i min %s sec')
                                        @endphp
                                    </span>
                                    @endif
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="barcodeIn">Enter barcode</label>
                            <input type="text" class="form-control" id="barcodeIn" name="barcode" autofocus>
                        </div>
                        <button type="submit" class="btn btn-primary">Send to printer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection