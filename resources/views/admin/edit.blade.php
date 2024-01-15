@extends('layouts.admin')

@section('page-content')
    <legend class="pt-4 pl-4">Edit Member Role</legend>

    <form class="pt-3 pl-4 pb-2 editForm" method="post" action="/admin/edit/member/role/{{ $member->id }}">

        @csrf
        @method('PATCH')

        <!--    ID  -->
        <div class="form-group">
            <label for="id" class="col-sm-2 control-label">ID</label>
            <div class="col-sm-10">
                <input readonly type="number" class="form-control @error('id') is-invalid @enderror" value="{{ $member->id }}" id="id" name="id" placeholder="2037820100">

                @error('id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!--    Name    -->
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10">
                <input readonly type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? $member->name }}" id="name" name="name" placeholder="{{ $member->name }}">

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div>

            <div>

                <div>

                    <label>
                        <input type="hidden" class="form-control @error('department') is-invalid @enderror" value="CSE" id="department_cse" name="department" @if($member->department === "CSE") checked @endif>
                    </label>

                    <label>
                        <input type="hidden" class="form-control @error('department') is-invalid @enderror" value="EEE" id="department_eee" name="department" @if($member->department === "EEE") checked @endif>
                    </label>

                    <label>
                        <input type="hidden" class="form-control @error('department') is-invalid @enderror" value="CE" id="department_ce" name="department" @if($member->department === "CE") checked @endif>
                    </label>

                    <label>
                        <input type="hidden" class="form-control @error('department') is-invalid @enderror" value="TE" id="department_te" name="department" @if($member->department === "TE") checked @endif>
                    </label>

                </div>

                @error('department')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div>
            <div>

                <div>

                    <label>
                        <input type="hidden" class="form-control @error('session') is-invalid @enderror" value="2018-2019" id="session_2018" name="session" @if($member->session === "2018-2019") checked @endif>
                    </label>

                    <label>
                        <input type="hidden" class="form-control @error('session') is-invalid @enderror" value="2019-2020" id="session_2019" name="session" @if($member->session === "2019-2020") checked @endif>
                    </label>

                    <label>
                        <input type="hidden" class="form-control @error('session') is-invalid @enderror" value="2020-2021" id="session_2020" name="session" @if($member->session === "2020-2021") checked @endif>
                    </label>

                    <label>
                        <input type="hidden" class="form-control @error('session') is-invalid @enderror" value="2021-2022" id="session_2021" name="session" @if($member->session === "2021-2022") checked @endif>
                    </label>

                    <label>
                        <input type="hidden" class="form-control @error('session') is-invalid @enderror" value="2022-2023" id="session_2022" name="session" @if($member->session === "2022-2023") checked @endif>
                    </label>

                </div>

                @error('session')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div>
            <div>
                <input type="hidden" class="form-control @error('joining_date') is-invalid @enderror" value="{{ old('joining_date') ?? $member->joining_date }}" id="joining_date" name="joining_date" placeholder="">

                @error('joining_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!--    Role    -->
        <div class="form-group">
            <label for="role" class="col-sm-2 control-label">Role</label>
            <div class="col-sm-10">

                <div class="radio-options">

                    <label class="radio-option">
                        <input type="radio" class="form-control @error('role') is-invalid @enderror" value="General Member" id="role_generalMember" name="role" @if($member->role === "General Member") checked @endif> General Member
                    </label>

                    <label class="radio-option ml-4">
                        <input type="radio" class="form-control @error('role') is-invalid @enderror" value="Admin" id="role_admin" name="role" @if($member->role === "Admin") checked @endif> Admin
                    </label>

                    <label class="radio-option ml-4">
                        <input type="radio" class="form-control @error('role') is-invalid @enderror" value="Master Admin" id="role_masterAdmin" name="role" @if($member->role === "Master Admin") checked @endif> Master Admin
                    </label>

                </div>

                @error('role')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div>
            <div>
                <input type="hidden" class="form-control @error('mobile_no') is-invalid @enderror" value="{{ old('mobile_no') ?? $member->mobile_no }}" id="mobile_no" name="mobile_no" placeholder="01700000000">

                @error('mobile_no')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div>
            <div>
                <input type="hidden" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') ?? $member->email }}" id="email" name="email" placeholder="israkahmed7@gmail.com">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div>
            <div>
                <input type="hidden" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') ?? $member->address }}" id="address" name="address" placeholder="123 Main St, Cityville">

                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div>
            <div>

                <div>

                    <label>
                        <input type="hidden" class="form-control @error('blood_group') is-invalid @enderror" value="A+" id="blood_group" name="blood_group" @if($member->blood_group === "A+") checked @endif>
                    </label>

                    <label>
                        <input type="hidden" class="form-control @error('blood_group') is-invalid @enderror" value="A-" id="blood_group" name="blood_group" @if($member->blood_group === "A-") checked @endif>
                    </label>

                    <label>
                        <input type="hidden" class="form-control @error('blood_group') is-invalid @enderror" value="B+" id="blood_group" name="blood_group"
                        @if($member->blood_group === "B+") checked @endif>
                    </label>

                    <label>
                        <input type="hidden" class="form-control @error('blood_group') is-invalid @enderror" value="B-" id="blood_group" name="blood_group" @if($member->blood_group === "B-") checked @endif>
                    </label>

                    <label>
                        <input type="hidden" class="form-control @error('blood_group') is-invalid @enderror" value="AB+" id="blood_group" name="blood_group" @if($member->blood_group === "AB+") checked @endif>
                    </label>

                    <label>
                        <input type="hidden" class="form-control @error('blood_group') is-invalid @enderror" value="AB-" id="blood_group" name="blood_group" @if($member->blood_group === "AB-") checked @endif>
                    </label>

                    <label>
                        <input type="hidden" class="form-control @error('blood_group') is-invalid @enderror" value="O+" id="blood_group" name="blood_group" @if($member->blood_group === "O+") checked @endif>
                    </label>

                    <label>
                        <input type="hidden" class="form-control @error('blood_group') is-invalid @enderror" value="O-" id="blood_group" name="blood_group" @if($member->blood_group === "O-") checked @endif>

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
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>

@endsection

