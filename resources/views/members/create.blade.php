@extends('layouts.admin')

@section('page-content')
    <legend class="pt-4 pl-4">Register Member</legend>

    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif

    <form class="pt-3 pl-4 pb-2" method="post" action="/register">

        @csrf

        <div class="form-group">
            <label for="id" class="col-sm-2 control-label">ID</label>
            <div class="col-sm-10">
                <input type="number" class="form-control @error('id') is-invalid @enderror" value="" id="id" name="id" placeholder="2037820100">

                @error('id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="password" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="password-confirm" class="col-sm-2 control-label">Confirm Password</label>
            <div class="col-sm-10">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
            </div>
        </div>

        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('name') is-invalid @enderror" value="" id="name" name="name" placeholder="Israk Ahmed">

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="department" class="col-sm-2 control-label">Department</label>
            <div class="col-sm-10">

                <div class="radio-options">

                    <label class="radio-option">
                        <input type="radio" class="form-control @error('department') is-invalid @enderror" value="CSE" id="department_cse" name="department"> CSE
                    </label>

                    <label class="radio-option ml-4">
                        <input type="radio" class="form-control @error('department') is-invalid @enderror" value="EEE" id="department_eee" name="department"> EEE
                    </label>

                    <label class="radio-option ml-4">
                        <input type="radio" class="form-control @error('department') is-invalid @enderror" value="CE" id="department_ce" name="department"> CE
                    </label>

                    <label class="radio-option ml-4">
                        <input type="radio" class="form-control @error('department') is-invalid @enderror" value="TE" id="department_te" name="department"> TE
                    </label>

                </div>

                @error('department')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="session" class="col-sm-2 control-label">Session</label>
            <div class="col-sm-10">

                <div class="radio-options">

                    <label class="radio-option">
                        <input type="radio" class="form-control @error('session') is-invalid @enderror" value="2018-2019" id="session_2018" name="session"> 2018-2019
                    </label>

                    <label class="radio-option ml-4">
                        <input type="radio" class="form-control @error('session') is-invalid @enderror" value="2019-2020" id="session_2019" name="session"> 2019-2020
                    </label>

                    <label class="radio-option ml-4">
                        <input type="radio" class="form-control @error('session') is-invalid @enderror" value="2020-2021" id="session_2020" name="session"> 2020-2021
                    </label>

                    <label class="radio-option ml-4">
                        <input type="radio" class="form-control @error('session') is-invalid @enderror" value="2021-2022" id="session_2021" name="session"> 2021-2022
                    </label>

                    <label class="radio-option ml-4">
                        <input type="radio" class="form-control @error('session') is-invalid @enderror" value="2022-2023" id="session_2022" name="session"> 2022-2023
                    </label>

                </div>

                @error('session')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="joining_date" class="col-sm-2 control-label">Joining Date</label>
            <div class="col-sm-10">
                <input type="date" class="form-control @error('joining_date') is-invalid @enderror" value="" id="joining_date" name="joining_date" placeholder="">

                @error('joining_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="mobile_no" class="col-sm-2 control-label">Mobile No.</label>
            <div class="col-sm-10">
                <input type="tel" class="form-control @error('mobile_no') is-invalid @enderror" value="" id="mobile_no" name="mobile_no" placeholder="01700000000">

                @error('mobile_no')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control @error('email') is-invalid @enderror" value="" id="email" name="email" placeholder="israkahmed7@gmail.com">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="address" class="col-sm-2 control-label">Address</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('address') is-invalid @enderror" value="" id="address" name="address" placeholder="123 Main St, Cityville">

                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="blood_group" class="col-sm-2 control-label">Blood Group</label>
            <div class="col-sm-10">

                <div class="radio-options">

                    <label class="radio-option">
                        <input type="radio" class="form-control @error('blood_group') is-invalid @enderror" value="A+" id="blood_group" name="blood_group"> A+
                    </label>

                    <label class="radio-option ml-4">
                        <input type="radio" class="form-control @error('blood_group') is-invalid @enderror" value="A-" id="blood_group" name="blood_group"> A-
                    </label>

                    <label class="radio-option ml-4">
                        <input type="radio" class="form-control @error('blood_group') is-invalid @enderror" value="B+" id="blood_group" name="blood_group"> B+
                    </label>

                    <label class="radio-option ml-4">
                        <input type="radio" class="form-control @error('blood_group') is-invalid @enderror" value="B-" id="blood_group" name="blood_group"> B-
                    </label>

                    <label class="radio-option ml-4">
                        <input type="radio" class="form-control @error('blood_group') is-invalid @enderror" value="AB+" id="blood_group" name="blood_group"> AB+
                    </label>

                    <label class="radio-option ml-4">
                        <input type="radio" class="form-control @error('blood_group') is-invalid @enderror" value="AB-" id="blood_group" name="blood_group"> AB-
                    </label>

                    <label class="radio-option ml-4">
                        <input type="radio" class="form-control @error('blood_group') is-invalid @enderror" value="O+" id="blood_group" name="blood_group"> O+
                    </label>

                    <label class="radio-option ml-4">
                        <input type="radio" class="form-control @error('blood_group') is-invalid @enderror" value="O-" id="blood_group" name="blood_group"> O-

                    </label>

                </div>

                @error('blood_group')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

@endsection



