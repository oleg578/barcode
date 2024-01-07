@extends('layouts.admin.dashboard')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <form method="GET" action="{{ route('barcodeindex') }}">
                <div class="form-row">
                    <div class="col">Barcodes</div>
                    <div class="col">
                        <select class="form-control" id="employee" name="employee" placeholder="Employee">
                            <option value="" @if ($curemployee===NULL) selected @endif>Choose...</option>
                            @foreach ($users as $user)
                            <option value="{{ $user->pseudo}}" @if ($user->pseudo===$curemployee) selected
                                @endif>
                                {{ $user->pseudo }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <select class="form-control" id="printerName" name="printername" placeholder="Printer Name">
                            <option value="" @if ($curprintername===NULL) selected @endif>Choose...</option>
                            @foreach ($printers as $printer)
                            <option value="{{ $printer->name}}" @if ($printer->name===$curprintername) selected @endif>
                                {{ $printer->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Filter') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Barcode</th>
                        <th scope="col">Printer Name</th>
                        <th scope="col">Employee</th>
                        <th scope="col">Created Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barcodes as $barcode)
                    <tr>
                        <th scope="row">{{$barcode->code}}</th>
                        <td>{{$barcode->printer_name}}</td>
                        <td>{{$barcode->employee_pseudo}}</td>
                        <td>{{$barcode->created_at}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $barcodes->withQueryString()->links() }}
        </div>
    </div>
</div>
@endsection