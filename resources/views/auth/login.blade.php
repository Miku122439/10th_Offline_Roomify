@extends('layouts.app')

<style>
    html,body
    {
        overflow: hidden;
    }

    .card
    {
        margin-top: 50px;
    }

    .card .card-header
    {
        color: #004aad;
    }
    .input-group .input-icon
    {
        color: #004aad;
    }

    .input-group input
    {
        border: 1px solid #004aad;
    }
    p
    {
        font-size: 18px;
        font-weight: lighter;
        color: #004aad;
    }

    a
    {
        color:#004aad !important;
    }

</style>

@section('content')
<div class="container">
    <div class="corner-circle circle-left-1"></div>
    <div class="corner-circle circle-left-2"></div>
    <div class="corner-circle circle-right-1"></div>
    <div class="corner-circle circle-right-2"></div>

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card border-0 mx-auto w-50">
                <div class="card-header border-0">{{ __('Login') }}</div>
                <p>Please enter your Email and your Password</p>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-4">
                            <div class="col-md-6 input-group">
                                <i class="fa-regular fa-envelope input-icon"></i>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" style="border-radius: 15px"name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6 input-group">
                                <i class="fa-solid fa-lock input-icon"></i>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" style="border-radius: 15px" name="password" required autocomplete="new-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4 mx-auto w-100">
                                <button type="submit" class="btn">
                                    {{ __('Login') }}
                                </button>
                            </div>

                            <p class="fw-light mt-1">Not a member yet? <a href="#">Resister!</a></p>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
