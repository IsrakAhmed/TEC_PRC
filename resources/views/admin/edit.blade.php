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


        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>

@endsection

