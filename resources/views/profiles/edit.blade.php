@extends('layouts.admin.printersdashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Profile Edit') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('profileupdate', $profile->id) }}">
                        @csrf
                        <div class="form-group row">
                            <label for="pfid" class="col-md-2 col-form-label text-md-right">{{ __('Printer Name')
                                }}</label>
                            <div class="col-md-4">
                                <div id="pfid" class="form-control">
                                    {{ $profile->id }}
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pfname" class="col-md-2 col-form-label text-md-right">{{ __('Profile Name')
                                }}</label>
                            <div class="col-md-10">
                                <input id="pfname" type="text" class="form-control" name="name"
                                    value="{{$profile->name}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pfsmbl" class="col-md-2 col-form-label text-md-right">{{ __('Symbol')
                                }}</label>
                            <div class="col-md-2">
                                <input id="pfsmbl" type="text"
                                    class="form-control @error('symbol') is-invalid @enderror" name="symbol"
                                    value="{{ $profile->symbol }}" required>
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
                                <textarea id="imgcode" cols="40" rows="12" class="form-control"
                                    name="image">{!! $profile->image !!}</textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-2">
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