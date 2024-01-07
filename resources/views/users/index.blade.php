@extends('layouts.admin.dashboard')

@section('content')
<div class="container-fluid">
    <nav class="nav">
        <a class="nav-link active" href="{{ route('usercreate') }}">Create new user</a>
    </nav>
    <div class="card">
        <div class="card-header">
            Users
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Employee ID</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Pseudo</th>
                        <th scope="col">Active</th>
                        <th scope="col">Role</th>
                        <th scope="col">Created Date</th>
                        <th scope="col">Updated Date</th>
                        <th scope="col" colspan="2" style="text-align:center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{$user->employee_id}}</th>
                        <td>{{$user->firstname}}</td>
                        <td>{{$user->lastname}}</td>
                        <td>{{$user->pseudo}}</td>
                        <td>{{$user->active}}</td>
                        <td>{{$user->role}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>{{$user->updated_at}}</td>
                        <td>
                            <a type="button" class="btn btn-outline-primary" href="/admin/users/edit/{{$user->id}}"
                                role="button">Edit</a>
                        </td>
                        <td>
                            <a type="button" class="btn btn-outline-danger" href="/admin/users/delete/{{$user->id}}"
                                role="button">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection