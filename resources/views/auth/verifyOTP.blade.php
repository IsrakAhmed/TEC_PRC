@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Enter OTP') }}</div>

                    @if(Session::has('error'))
                        <div class="alert alert-danger">
                            {{ Session::get('error') }}
                        </div>
                    @endif

                    <div class="card-body">
                        <form method="POST" action="/reset-password/verify-otp">
                            @csrf

                            <div class="alert alert-success text-center" role="alert">
                                {{ __('An OTP is sent to your registered email address, Please check your email.') }}
                            </div>

                            <div class="row mb-3">
                                <label for="otp" class="col-md-4 col-form-label text-md-end">{{ __('OTP') }}</label>

                                <div class="col-md-6">
                                    <input id="otp" type="number" class="form-control @error('otp') is-invalid @enderror" name="otp" autocomplete="otp" autofocus>

                                    @error('otp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit OTP') }}
                                    </button>

                                    <a href="/reset-password/verify" class="btn btn-primary ml-2">
                                        {{ __('Resend OTP') }}
                                    </a>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
