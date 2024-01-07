@extends('layouts.admin.printersdashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Printer Create') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('printerstore') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="printername" class="col-md-4 col-form-label text-md-right">{{ __('Printer Name')
                                }}</label>
                            <div class="col-md-6">
                                <input id="printername" type="text"
                                    class="form-control @error('printername') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autofocus>
                                @error('printername')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="printerip" class="col-md-4 col-form-label text-md-right">{{ __('Printer IP')
                                }}</label>
                            <div class="col-md-6">
                                <input id="printerip" type="text" class="form-control @error('ip') is-invalid @enderror"
                                    name="ip" value="{{ old('ip') }}" required>
                                @error('printerip')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="printerport" class="col-md-4 col-form-label text-md-right">{{ __('Printer Port')
                                }}</label>
                            <div class="col-md-6">
                                <input id="printerport" type="text"
                                    class="form-control @error('port') is-invalid @enderror" name="port"
                                    value="{{ old('port') }}" required>
                                @error('port')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="zplprefix" class="col-md-4 col-form-label text-md-right">
                                {{ __('ZPL Prefix') }}
                            </label>
                            <div class="col-md-6">
                                <textarea id="zplprefix" cols="40" rows="5"
                                    class="form-control @error('zpl_prefix') is-invalid @enderror" name="zpl_prefix"
                                    value="{{ old('zpl_prefix') }}"></textarea>
                                @error('zpl_prefix')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="zplsuffix" class="col-md-4 col-form-label text-md-right">
                                {{ __('ZPL Suffix') }}
                            </label>
                            <div class="col-md-6">
                                <textarea id="zplsuffix" cols="40" rows="5"
                                    class="form-control @error('zpl_suffix') is-invalid @enderror" name="zpl_suffix"
                                    value="{{ old('zpl_suffix') }}"></textarea>
                                @error('zpl_suffix')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="zplcode" class="col-md-4 col-form-label text-md-right">
                                {{ __('ZPL Code') }}
                            </label>
                            <div class="col-md-6">
                                <textarea id="zplcode" cols="40" rows="5"
                                    class="form-control @error('zpl_code') is-invalid @enderror" name="zpl_code"
                                    value="{{ old('zpl_code') }}" required></textarea>
                                @error('zpl_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
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