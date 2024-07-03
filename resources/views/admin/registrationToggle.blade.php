@extends('layouts.admin')

@section('page-content')
    <br>
    <br>
    <h1 class="text-center text-primary">TEC Programming & Robotics Club</h1>

    <h2 class="text-center pt-4">Registration ON / OFF</h2>

    <form class="pt-3 pl-4 pb-2 editForm" method="post" action="/register/toggle/{{ $status->id }}">

        @csrf
        @method('PATCH')

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


        <!--    ID  -->
        <div class="form-group">
            <label for="id" class="col-sm-2 control-label">ID</label>
            <div class="col-sm-10">
                <input readonly type="number" class="form-control @error('id') is-invalid @enderror" value="{{ $status->id }}" id="id" name="id" placeholder="2037820100">

                @error('id')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!--    Status    -->
        <div class="form-group">
            <label for="flag" class="col-sm-2 control-label">Status</label>
            <div class="col-sm-10">

                <div class="radio-options">

                    <label class="radio-option">
                        <input type="radio" class="form-control @error('flag') is-invalid @enderror" value=0 id="flag" name="flag" @if($status->flag === 0) checked @endif> OFF
                    </label>

                    <label class="radio-option ml-4">
                        <input type="radio" class="form-control @error('flag') is-invalid @enderror" value=1 id="flag" name="flag" @if($status->flag === 1) checked @endif> ON
                    </label>

                </div>

                @error('flag')
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

    <footer class="footer mt-auto pt-2 pb-3">
        <div class="container text-center">
            <p class="mt-2" style="margin-bottom: 0.5px">© 2024 Israk Ahmed. All rights reserved.</p>
            <a href="https://israkahmed.github.io/Portfolio/">Developed by: Israk Ahmed</a>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function () {
            function performSearch() {
                $.ajax({
                    url: $('#member-search-form').attr('action'),
                    method: 'GET',
                    data: $('#member-search-form').serialize(),
                    success: function (data) {
                        $('#member-table-body').html(data);
                    }
                });
            }

            $('#search_term').on('input', function () {
                performSearch();
            });

            performSearch();
        });
    </script>


    <style>
        /* Basic table styling */
        table {
            width: 130%;
            border-collapse: collapse;
            margin: 20px 0;
            font-family: Arial, sans-serif;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Styling for no members found message */
        #member-table-body td[colspan="9"] {
            color: red;
            padding-top: 25px;
            padding-left: 22em;
            font-weight: bold;
        }

        /* Alternating row colors for better readability */
        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }


    </style>

@endsection
