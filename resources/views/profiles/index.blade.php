@extends('layouts.admin.printersdashboard')

@section('content')
<div class="container-fluid">
    <nav class="nav">
        <a class="nav-link active" href="{{ route('profilecreate') }}">New Profile</a>
    </nav>
    <div class="card">
        <div class="card-header">
            Profiles
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Symbol</th>
                        <th scope="col">Image</th>
                        <th scope="col">Created Date</th>
                        <th scope="col">Updated Date</th>
                        <th scope="col" colspan="2" style="text-align:center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profiles as $profile)
                    <tr>
                        <th scope="row">{{$profile->id}}</th>
                        <td>{{$profile->name}}</td>
                        <td>{{$profile->symbol}}</td>
                        <td class="zpl">{{ Str::limit($profile->image, 40) }}</td>
                        <td>{{$profile->created_at}}</td>
                        <td>{{$profile->updated_at}}</td>
                        <td>
                            <a type="button" class="btn btn-outline-primary"
                                href="/admin/profiles/edit/{{$profile->id}}" role="button">Edit</a>
                        </td>
                        <td>
                            <a type="button" class="btn btn-outline-danger"
                                href="/admin/profiles/delete/{{$profile->id}}" role="button">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection