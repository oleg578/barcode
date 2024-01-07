@extends('layouts.admin.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User Update') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('userupdate', $user->id) }}">
                        @csrf
                        <div class="form-group row">
                            <label for="firstname"
                                class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>
                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control" name="firstname"
                                    value="{{ $user->firstname }}" required autocomplete="firstname" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lastname"
                                class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>
                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control" name="lastname"
                                    value="{{$user->lastname}}" required autocomplete="lastname">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="employeeid"
                                class="col-md-4 col-form-label text-md-right">{{ __('Employee ID') }}</label>
                            <div class="col-md-6">
                                <div id="employeeid" class="form-control">{{$user->employee_id}}</div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="userRole" class="col-md-4 col-form-label text-md-right">User Role</label>
                            <div class="col-md-6">
                                <select class="form-control" id="userRole" name="role">
                                    <option value="user" @if ($user->role==='user')selected @endif>user</option>
                                    <option value="manager" @if ($user->role==='manager')selected @endif>manager
                                    </option>
                                    <option value="admin" @if ($user->role==='admin')selected @endif>admin</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('New password') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    autocomplete="new-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection