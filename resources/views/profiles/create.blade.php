@extends('layouts.admin.printersdashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Profile Create') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('profilestore') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="pfid" class="col-md-2 col-form-label text-md-right">{{ __('Profile ID')
                                }}</label>
                            <div class="col-md-4">
                                <input id="pfid" type="text" class="form-control @error('id') is-invalid @enderror"
                                    name="id" value="{{ old('id') }}" required autofocus>
                                @error('printername')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pfname" class="col-md-2 col-form-label text-md-right">{{ __('Profile Name')
                                }}</label>
                            <div class="col-md-10">
                                <input id="pfname" type="text"
                                    class="form-control @error('pfname') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autofocus>
                                @error('printername')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pfsmbl" class="col-md-2 col-form-label text-md-right">{{ __('Symbol')
                                }}</label>
                            <div class="col-md-2">
                                <input id="pfsmbl" type="text"
                                    class="form-control @error('symbol') is-invalid @enderror" name="symbol"
                                    value="{{ old('symbol') }}" required>
                                @error('symbol')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="imgcode" class="col-md-2 col-form-label text-md-right">
                                {{ __('Image code') }}
                            </label>
                            <div class="col-md-10">
                                <textarea id="imgcode" cols="40" rows="12"
                                    class="form-control @error('image') is-invalid @enderror" name="image"
                                    value="{{ old('image') }}"></textarea>
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-2">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
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