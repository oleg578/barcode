@extends('layouts.admin.dashboard')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="col">Barcodes CSV Report</div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('barcodesoutreport') }}">
                    @csrf
                    <input type="hidden" name="report_type" value="staff_report">
                    <div class="form-row">
                        <div class="col">
                            <select class="form-control" id="employeeId" name="employee" placeholder="Employee">
                                <option value="">Employee</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->pseudo}}">
                                        {{ $user->pseudo }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <select class="form-control" id="printerName" name="printername" placeholder="Printer Name">
                                <option value="">Printer Name</option>
                                @foreach ($printers as $printer)
                                    <option value="{{ $printer->name}}">
                                        {{ $printer->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary col-4">
                                {{ __('Create CSV report') }}
                            </button>
                        </div>
                    </div>
                </form>
                <div style="height:2ch"></div>
                <form method="POST"  action="{{ route('barcodesreportcsv') }}">
                    @csrf
                    <input type="hidden" name="report_type" value="date_report">
                    <div class="form-row">
                        <div class="col"></div>
                        <div class="col">
                            <div class="form-group row justify-content-end pr-3">
                                <label for="workdate" class="col-form-label col-2">Work date</label>
                                <input type="date" name="workdate" max="2030-12-31"
                                       min="2000-01-01" class="form-control col-4" id="workdate">
                            </div>
                        </div>
                        <div class="col">
                                <button type="submit" class="btn btn-primary col-4">
                                    {{ __('Get Full CSV report') }}
                                </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
