@extends('layouts.admin.printersdashboard')

@section('content')
<div class="container-fluid">
    <nav class="nav">
        <a class="nav-link active" href="{{ route('printercreate') }}">New Printer</a>
    </nav>
    <div class="card">
        <div class="card-header">
            Printers
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">IP</th>
                        <th scope="col">Port</th>
                        <th scope="col">ZPL Prefix</th>
                        <th scope="col">ZPL Suffix</th>
                        <th scope="col">ZPL Code</th>
                        <th scope="col">Created Date</th>
                        <th scope="col">Updated Date</th>
                        <th scope="col" colspan="2" style="text-align:center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($printers as $printer)
                    <tr>
                        <th scope="row">{{$printer->name}}</th>
                        <td>{{$printer->ip}}</td>
                        <td>{{$printer->port}}</td>
                        <td class="zpl">{{ Str::limit($printer->zpl_prefix, 36) }}</td>
                        <td class="zpl">{{ Str::limit($printer->zpl_suffix, 36) }}</td>
                        <td class="zpl">{{ Str::limit($printer->zpl_code, 36) }}</td>
                        <td>{{$printer->created_at}}</td>
                        <td>{{$printer->updated_at}}</td>
                        <td>
                            <a type="button" class="btn btn-outline-primary"
                                href="/admin/printers/edit/{{$printer->id}}" role="button">Edit</a>
                        </td>
                        <td>
                            <a type="button" class="btn btn-outline-danger"
                                href="/admin/printers/delete/{{$printer->id}}" role="button">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection