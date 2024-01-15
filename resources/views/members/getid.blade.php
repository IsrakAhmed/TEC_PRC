@extends('layouts.admin')

@section('page-content')
    <legend class="pt-4 pl-4">Enter Member ID To Edit</legend>

    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif

    @if(Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
    @endif

    <form action="/edit/member" method="post" class="search-form">
        @csrf

        <div class="form-group">
            <div class="col-sm-10">
                <input type="number" class="form-control @error('id') is-invalid @enderror"
                id="id" name="id">

                @error('id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Go</button>
            </div>
        </div>
    </form>



@endsection

