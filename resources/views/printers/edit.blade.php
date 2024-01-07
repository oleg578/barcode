@extends('layouts.admin.printersdashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Printer Edit') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('printerupdate', $printer->id) }}">
                        @csrf
                        <div class="form-group row">
                            <label for="printername" class="col-md-4 col-form-label text-md-right">{{ __('Printer Name')
                                }}</label>
                            <div class="col-md-6">
                                <div id="printername" class="form-control">
                                    {{ $printer->name }}
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="printerip" class="col-md-4 col-form-label text-md-right">{{ __('Printer IP')
                                }}</label>
                            <div class="col-md-6">
                                <input id="printerip" type="text" class="form-control" name="ip"
                                    value="{{ $printer->ip }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="printerport" class="col-md-4 col-form-label text-md-right">{{ __('Printer Port')
                                }}</label>
                            <div class="col-md-6">
                                <input id="printerport" type="text" class="form-control" name="port"
                                    value="{{ $printer->port }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="zplprefix" class="col-md-4 col-form-label text-md-right">
                                {{ __('ZPL Prefix') }}
                            </label>
                            <div class="col-md-6">
                                <textarea id="zplprefix" cols="40" rows="5" class="form-control"
                                    name="zpl_prefix">{!! $printer->zpl_prefix !!}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="zplsuffix" class="col-md-4 col-form-label text-md-right">
                                {{ __('ZPL Suffix') }}
                            </label>
                            <div class="col-md-6">
                                <textarea id="zplsuffix" cols="40" rows="5" class="form-control"
                                    name="zpl_suffix">{!! $printer->zpl_suffix !!}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="zplcode" class="col-md-4 col-form-label text-md-right">
                                {{ __('ZPL Code') }}
                            </label>
                            <div class="col-md-6">
                                <textarea id="zplcode" cols="40" rows="5" class="form-control" name="zpl_code"
                                    required>{!! $printer->zpl_code !!}</textarea>
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