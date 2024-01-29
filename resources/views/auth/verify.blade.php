@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Verify your Identity') }}</div>

                    @if(Session::has('error'))
                        <div class="alert alert-danger">
                            {{ Session::get('error') }}
                        </div>
                    @endif

                    <div class="card-body">
                        <form method="POST" action="/reset-password/verify">
                            @csrf

                            <div class="alert alert-secondary text-center" role="alert">
                                {{ __('An OTP will be send to your registered email address') }}
                            </div>

                            <div class="row mb-3">
                                <label for="id" class="col-md-4 col-form-label text-md-end">{{ __('ID') }}</label>

                                <div class="col-md-6">
                                    <input id="id" type="number" class="form-control @error('id') is-invalid @enderror" name="id" value="{{ old('id') }}" autocomplete="id" autofocus>

                                    @error('id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Send OTP') }}
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
